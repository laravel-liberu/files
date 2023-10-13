<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Helpers\Table;

class DropOldIndex implements MigratesTable
{
    private const Index = 'files_attachable_type_attachable_id_index';

    public function isMigrated(): bool
    {
        return ! Table::hasIndex('files', self::Index);
    }

    public function migrateTable(): void
    {
        Schema::table('files', fn ($table) => $table->dropIndex(self::Index));
    }
}
