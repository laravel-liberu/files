<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Files\Http\Controllers\Type\Create;
use LaravelLiberu\Files\Http\Controllers\Type\Destroy;
use LaravelLiberu\Files\Http\Controllers\Type\Edit;
use LaravelLiberu\Files\Http\Controllers\Type\ExportExcel;
use LaravelLiberu\Files\Http\Controllers\Type\InitTable;
use LaravelLiberu\Files\Http\Controllers\Type\Store;
use LaravelLiberu\Files\Http\Controllers\Type\TableData;
use LaravelLiberu\Files\Http\Controllers\Type\Update;

Route::prefix('fileTypes')
    ->as('fileTypes.')
    ->group(function () {
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{type}/edit', Edit::class)->name('edit');
        Route::patch('{type}', Update::class)->name('update');
        Route::delete('{type}', Destroy::class)->name('destroy');

        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
    });
