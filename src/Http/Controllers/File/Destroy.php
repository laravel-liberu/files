<?php

namespace LaravelLiberu\Files\Http\Controllers\File;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use LaravelLiberu\Files\Models\File;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(File $file)
    {
        $this->authorize('manage', $file);

        DB::transaction(fn () => $file->delete(true));
    }
}
