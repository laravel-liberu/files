<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Http\Requests\ValidateType;
use LaravelLiberu\Files\Models\Type;

class Update extends Controller
{
    public function __invoke(ValidateType $request, Type $type)
    {
        $type->fill($request->validated());

        if ($type->isDirty('folder')) {
            $type->move();
        }

        $type->save();

        return ['message' => __('The file type was successfully updated')];
    }
}
