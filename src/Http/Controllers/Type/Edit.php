<?php

namespace LaravelLiberu\Files\Http\Controllers\Type;

use Illuminate\Routing\Controller;
use LaravelLiberu\Files\Forms\Builders\Type;
use LaravelLiberu\Files\Models\Type as Model;

class Edit extends Controller
{
    public function __invoke(Model $type, Type $form)
    {
        return ['form' => $form->edit($type)];
    }
}
