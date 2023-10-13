<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Files\Http\Controllers\File\Share;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/core')
    ->as('core.')
    ->group(function () {
        require __DIR__.'/app/files.php';
        require __DIR__.'/app/uploads.php';
    });

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        require __DIR__.'/app/types.php';
    });

Route::middleware(['signed', 'bindings'])
    ->prefix('api/core/files')
    ->as('core.files.')
    ->group(function () {
        Route::get('share/{file}', Share::class)->name('share');
    });
