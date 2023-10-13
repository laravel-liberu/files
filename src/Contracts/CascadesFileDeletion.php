<?php

namespace LaravelLiberu\Files\Contracts;

use LaravelLiberu\Files\Models\File;

interface CascadesFileDeletion
{
    public static function cascadeFileDeletion(File $file): void;
}
