<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;

class ValidationHelper
{
    /**
     * Mapping tipe kolom database ke rule Laravel
     */
    protected static $typeMap = [
    'bigint'        => 'integer',
    'bigint unsigned' => 'integer',
    'integer'       => 'integer',
    'int'           => 'integer',
    'smallint'      => 'integer',
    'tinyint'       => 'integer',
    'tinyint(1)'    => 'boolean',
    'boolean'       => 'boolean',
    'decimal'       => 'numeric',
    'double'        => 'numeric',
    'float'         => 'numeric',
    'string'        => 'string',
    'varchar'       => 'string',
    'text'          => 'string',
    'date'          => 'date',
    ];

    /**
     * Generate rules untuk create
     */
    public static function rulesFromModel(string $modelClass): array
    {
        $model = new $modelClass;
        $table = $model->getTable();
        $fillable = $model->getFillable();
        $rules = [];

        foreach ($fillable as $field) {
            if (!Schema::hasColumn($table, $field)) {
                continue;
            }

            $type = Schema::getColumnType($table, $field);
            $rule = self::$typeMap[$type] ?? 'string';

            $rules[$field] = ['required', $rule];
        }

        return $rules;
    }

    /**
     * Generate rules untuk update
     */
    public static function updateRulesFromModel($modelClass)
    {
        $rules = self::rulesFromModel($modelClass);

        foreach ($rules as $field => &$rule) {
            if (is_string($rule)) {
                $rule = str_replace('required', 'nullable', $rule);
            } elseif (is_array($rule)) {
                $rule = array_map(function ($r) {
                    return $r === 'required' ? 'nullable' : $r;
                }, $rule);
            }
        }

        return $rules;
    }

}
