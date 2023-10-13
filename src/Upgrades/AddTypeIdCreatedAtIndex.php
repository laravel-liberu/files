<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Contracts\Prioritization;
use LaravelLiberu\Upgrade\Contracts\ShouldRunManually;
use LaravelLiberu\Upgrade\Helpers\Table;

class AddTypeIdCreatedAtIndex implements MigratesTable, Prioritization, ShouldRunManually
{
    private const Index = 'files_type_id_created_at_index';

    public function priority(): int
    {
        return 106;
    }

    public function isMigrated(): bool
    {
        return Table::hasIndex('files', self::Index);
    }

    public function migrateTable(): void
    {
        Schema::table('files', fn ($table) => $table
            ->index(['type_id', 'created_at']));
    }
}
