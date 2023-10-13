<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Resources\File as Resource;
use LaravelLiberu\Files\Models\File;

class Recent extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request)
    {
        $files = File::for($request->user())
            ->between(json_decode($request->get('interval'), true))
            ->filter($request->get('query'))
            ->get();

        return Resource::collection($files);
    }
}
