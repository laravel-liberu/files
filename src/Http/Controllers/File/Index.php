<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Resources\Type as Resource;
use LaravelLiberu\Files\Models\Type;

class Index extends Controller
{
    public function __invoke()
    {
        $folders = Type::ordered()->browsable()->get();

        return ['folders' => Resource::collection($folders)];
    }
}
