<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeRestApi extends Command
{
    protected $signature = 'make:rest {name}';
    protected $description = 'Generate RESTful API by use-case (Controller, Resource, Route)';

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
            '--migration' => true]);

        // 2. Generate Resource
        $this->call('make:resource', ['name' => $resourceName]);

        // 3. Generate 4 Controller by use-case
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

Route::prefix('{$nameLower}s')->name('{$nameLower}.')->group(function () {
    Route::get('/', GetAll{$name}Controller::class);
    Route::get('/{id}', GetOne{$name}Controller::class);
    Route::post('/', Create{$name}Controller::class);
    Route::put('/{id}', Update{$name}Controller::class);
    Route::delete('/{id}', Delete{$name}Controller::class);
});

EOT;

        // Inject only if not exists
        $routeContent = File::get($routeFile);
        if (!Str::contains($routeContent, "GetAll{$name}Controller")) {
            File::append($routeFile, $routeStub);
            $this->info("✅ Route group for {$name} injected to routes/api.php");
        } else {
            $this->warn("⚠️ Route group for {$name} already exists in routes/api.php");
        }
        $this->info("✅ REST API By Adhinath for {$name} generated.");
    }
}
