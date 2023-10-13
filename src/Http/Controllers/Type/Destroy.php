<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Models\Type;
use LaravelLiberu\Helpers\Traits\AvoidsDeletionConflicts;

class Destroy extends Controller
{
    use AvoidsDeletionConflicts;

    public function __invoke(Type $type)
    {
        $type->delete();

        return [
            'message' => __('The file type was successfully deleted'),
            'redirect' => 'administration.fileTypes.index',
        ];
    }
}
