<?php

namespace LaravelLiberu\Files\Forms\Builders;

use LaravelLiberu\Files\Models\Type as Model;
use LaravelLiberu\Forms\Services\Form;

class Type
{
    private const TemplatePath = __DIR__.'/../Templates/type.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form($this->templatePath()));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Model $type)
    {
        return $this->form->edit($type);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
