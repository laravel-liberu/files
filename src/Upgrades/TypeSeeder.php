<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Files\Database\Seeders\TypeSeeder as Seeder;
use LaravelLiberu\Files\Models\Type;
use LaravelLiberu\Upgrade\Contracts\MigratesData;

class TypeSeeder implements MigratesData
{
    public function isMigrated(): bool
    {
        return Schema::hasTable('file_types') && Type::query()->exists();
    }

    public function migrateData(): void
    {
        $seeder = Seeder::class;

        Artisan::call('db:seed', [
            '--class' => $seeder,
            '--force' => true,
        ]);
    }
}
