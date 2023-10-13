<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Upgrade\Contracts\BeforeMigration;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Helpers\Column;

class FileIds implements MigratesTable, BeforeMigration
{
    public function isMigrated(): bool
    {
        return Column::isBigInteger('files', 'id');
    }

    public function migrateTable(): void
    {
        Schema::table('files', fn ($table) => $table->id()->change());
    }
}
