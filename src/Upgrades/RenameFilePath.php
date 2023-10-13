<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Contracts\Prioritization;
use LaravelLiberu\Upgrade\Contracts\ShouldRunManually;
use LaravelLiberu\Upgrade\Helpers\Table;

class RenameFilePath implements MigratesTable, Prioritization, ShouldRunManually
{
    public function priority(): int
    {
        return 99;
    }

    public function isMigrated(): bool
    {
        return Table::hasColumn('files', 'saved_name');
    }

    public function migrateTable(): void
    {
        Schema::table('files', fn ($table) => $table
            ->renameColumn('path', 'saved_name'));
    }
}
