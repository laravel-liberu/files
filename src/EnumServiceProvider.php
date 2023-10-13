<?php

namespace LaravelLiberu\Files;

use LaravelLiberu\Enums\EnumServiceProvider as ServiceProvider;
use LaravelLiberu\Files\Enums\TemporaryLinkDuration;

class EnumServiceProvider extends ServiceProvider
{
    public $register = [
        'temporaryLinkDuration' => TemporaryLinkDuration::class,
    ];
}
