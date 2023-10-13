<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Requests\ValidateType;
use LaravelLiberu\Files\Models\Type;

class Store extends Controller
{
    public function __invoke(ValidateType $request, Type $type)
    {
        $type->fill($request->validated())->save();

        return [
            'message' => __('The file type was created!'),
            'redirect' => 'administration.fileTypes.edit',
            'param' => ['type' => $type->id],
        ];
    }
}
