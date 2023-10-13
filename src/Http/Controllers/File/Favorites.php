<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Resources\File;

class Favorites extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request)
    {
        $files = $request->user()
            ->favoriteFiles()
            ->withData()
            ->between(json_decode($request->get('interval'), true))
            ->filter($request->get('query'))
            ->paginated()
            ->latest('id')
            ->get();

        return File::collection($files);
    }
}
