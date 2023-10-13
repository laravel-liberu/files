<?php

namespace LaravelLiberu\Files\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Files\Models\Type as Model;
use LaravelLiberu\Tables\Contracts\Table;

class Type implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/types.json';

    public function query(): Builder
    {
        return Model::selectRaw('id, name, icon, folder, model, is_browsable, is_system');
    }

    public function templatePath(): string
    {
        return self::TemplatePath;
    }
}
