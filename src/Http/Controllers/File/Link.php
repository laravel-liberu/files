<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Requests\ValidateLink;
use LaravelLiberu\Files\Models\File;

class Link extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateLink $request, File $file)
    {
        $this->authorize('access', $file);

        return ['link' => $file->temporaryLink()];
    }
}
