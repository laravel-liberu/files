<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'core.uploads.store', 'description' => 'Upload file', 'is_default' => true],
        ['name' => 'core.uploads.destroy', 'description' => 'Delete upload', 'is_default' => true],
    ];
};
