<?php

namespace LaravelLiberu\Files\Dynamics\Relations;

use Closure;
use LaravelLiberu\DynamicMethods\Contracts\Method;
use LaravelLiberu\Files\Models\Favorite;
use LaravelLiberu\Files\Models\File;

class FavoriteFiles implements Method
{
    public function name(): string
    {
        return 'favoriteFiles';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasManyThrough(
            File::class,
            Favorite::class,
            'user_id',
            'id',
            'id',
            'file_id'
        );
    }
}
