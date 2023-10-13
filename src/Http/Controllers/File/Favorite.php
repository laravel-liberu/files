<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Models\Favorite as Model;
use LaravelLiberu\Files\Models\File;

class Favorite extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request, File $file)
    {
        $this->authorize('access', $file);

        return ['isFavorite' => Model::toggle($request->user(), $file)];
    }
}
