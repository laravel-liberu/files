<?php

namespace LaravelLiberu\Files\Upgrades;

use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Files\Models\File;
use LaravelLiberu\Upgrade\Contracts\MigratesData;
use LaravelLiberu\Upgrade\Contracts\MigratesTable;
use LaravelLiberu\Upgrade\Contracts\ShouldRunManually;
use LaravelLiberu\Upgrade\Helpers\Table;

class FileIsPublic implements MigratesTable, MigratesData, ShouldRunManually
{
    public function isMigrated(): bool
    {
        return Table::hasColumn('files', 'is_public');
    }

    public function migrateTable(): void
    {
        Schema::table('files', fn ($table) => $table
            ->boolean('is_public')->nullable()->after('mime_type'));
    }

    public function migrateData(): void
    {
        File::whereNull('is_public')->update(['is_public' => false]);
    }
}
