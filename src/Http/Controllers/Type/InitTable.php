<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Tables\Builders\Type;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = Type::class;
}
