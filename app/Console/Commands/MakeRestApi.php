<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeRestApi extends Command
{
    protected $signature = 'nathgen:rest {name}';
    protected $description = 'Generate RESTful API (Controller, Resource, Route, Model, Migration) with optional interactive migration & model fillable setup';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $nameLower = Str::lower($name);
        $resourceName = "{$name}Resource";

        $controllerPath = app_path("Http/Controllers/Api/{$nameLower}");
        if (!File::exists($controllerPath)) {
            File::makeDirectory($controllerPath, 0755, true);
        }

        // 1. Generate Model & migration
        $this->call('make:model', [
            'name' => $name,
            '--migration' => true,
            '--factory' => true
        ]);

        // 2. Generate Resource
        $this->call('make:resource', ['name' => $resourceName]);

        // 3. Generate 5 Controller by use-case
        $controllers = [
            'Create' => 'create-controller.stub',
            'GetAll' => 'getall-controller.stub',
            'GetOne' => 'getone-controller.stub',
            'Update' => 'update-controller.stub',
            'Delete' => 'delete-controller.stub',
        ];

        foreach ($controllers as $type => $stubFile) {
            $controllerClass = "{$type}{$name}Controller";
            $stub = File::get(base_path("stubs/rest/{$stubFile}"));
            $stub = str_replace(
                ['{{model}}', '{{modelLower}}', '{{resource}}'],
                [$name, $nameLower, $resourceName],
                $stub
            );
            $targetPath = "{$controllerPath}/{$controllerClass}.php";
            if (!File::exists($targetPath)) {
                File::put($targetPath, $stub);
                $this->info("Created: {$controllerClass}");
            } else {
                $this->warn("Skipped (exists): {$controllerClass}");
            }
        }

        // 4. Overwrite Resource stub
        $resourcePath = app_path("Http/Resources/{$resourceName}.php");
        $resourceStub = File::get(base_path("stubs/rest/product-resource.stub"));
        $resourceStub = str_replace('{{model}}', $name, $resourceStub);
        File::put($resourcePath, $resourceStub);
        $this->info("Updated: {$resourceName}");

        // 5. Auto Inject Route
        $routeFile = base_path('routes/api.php');
        $routeStub = <<<EOT

// Auto-generated for {$name}
use App\Http\Controllers\Api\\{$nameLower}\\Create{$name}Controller;
use App\Http\Controllers\Api\\{$nameLower}\\GetAll{$name}Controller;
use App\Http\Controllers\Api\\{$nameLower}\\GetOne{$name}Controller;
use App\Http\Controllers\Api\\{$nameLower}\\Update{$name}Controller;
use App\Http\Controllers\Api\\{$nameLower}\\Delete{$name}Controller;

Route::prefix('{$nameLower}')->name('{$nameLower}.')->group(function () {
    Route::get('/', GetAll{$name}Controller::class);
    Route::get('/{id}', GetOne{$name}Controller::class);
    Route::post('/', Create{$name}Controller::class);
    Route::put('/{id}', Update{$name}Controller::class);
    Route::delete('/{id}', Delete{$name}Controller::class);
});

EOT;

        $routeContent = File::get($routeFile);
        if (!Str::contains($routeContent, "GetAll{$name}Controller")) {
            File::append($routeFile, $routeStub);
            $this->info("✅ Route group for {$name} injected to routes/api.php");
        } else {
            $this->warn("⚠️ Route group for {$name} already exists in routes/api.php");
        }

        // 6. Optional: Interactive migration & fillable setup
        if ($this->confirm('Aktifkan mode interaktif untuk migration & model?', false)) {
            $this->interactiveMigrationAndModel($name);
        }

        $this->info("✅ REST API By NathGen for {$name} generated.");
    }

    protected function interactiveMigrationAndModel($name)
    {
        $tableName = Str::snake(Str::pluralStudly($name));
        $migrationFile = collect(File::files(database_path('migrations')))
            ->first(fn($file) => Str::contains($file->getFilename(), "create_{$tableName}_table"));

        if (!$migrationFile) {
            $this->error("Migration file for {$tableName} not found.");
            return;
        }

        $fields = [];
        while (true) {
            $fieldName = $this->ask('Nama field (atau tekan Enter untuk selesai)');
            if (!$fieldName) break;

            $type = $this->choice('Tipe data', [
                'string', 'text', 'integer', 'bigInteger', 'boolean',
                'date', 'datetime', 'float', 'decimal'
            ], 0);

            $fields[] = compact('fieldName', 'type');
        }

        // Inject ke migration setelah $table->id();
        $migrationContent = File::get($migrationFile->getPathname());
        $schemaLines = '';
        foreach ($fields as $field) {
            $schemaLines .= "            \$table->{$field['type']}('{$field['fieldName']}');\n";
        }

        $migrationContent = preg_replace(
            '/(\$table->id\(\);\n)/',
            "$1{$schemaLines}",
            $migrationContent,
            1
        );

        File::put($migrationFile->getPathname(), $migrationContent);
        $this->info("✅ Fields injected into migration: " . implode(', ', array_column($fields, 'fieldName')));

        // Inject ke model fillable
        $modelPath = app_path("Models/{$name}.php");
        $modelContent = File::get($modelPath);
        $fillableArray = "protected \$fillable = ['" . implode("', '", array_column($fields, 'fieldName')) . "'];";
        $modelContent = preg_replace(
            '/(class\s+' . $name . '\s+extends\s+Model\s*\{)/',
            "$1\n    {$fillableArray}\n",
            $modelContent
        );
        File::put($modelPath, $modelContent);
        $this->info("✅ Fillable fields added to model: " . implode(', ', array_column($fields, 'fieldName')));
    }

}
