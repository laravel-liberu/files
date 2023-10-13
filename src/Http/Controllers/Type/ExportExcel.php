<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Tables\Builders\Type;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = Type::class;
}
