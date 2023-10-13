<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Models\File;

class Share extends Controller
{
    public function __invoke(File $file)
    {
        return $file->download();
    }
}
