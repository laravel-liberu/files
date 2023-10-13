<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Tables\Builders\Type;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = Type::class;
}
