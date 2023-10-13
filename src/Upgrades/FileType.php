<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Contracts\Prioritization;
use LaravelLiberu\Upgrade\Contracts\ShouldRunManually;
use LaravelLiberu\Upgrade\Helpers\Table;

class FileType implements MigratesTable, Prioritization, ShouldRunManually
{
    public function priority(): int
    {
        return 105;
    }

    public function isMigrated(): bool
    {
        return Table::hasColumn('files', 'type_id');
    }

    public function migrateTable(): void
    {
        Schema::table('files', function ($table) {
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            $table->foreign('type_id')->references('id')->on('file_types');
        });
    }
}
