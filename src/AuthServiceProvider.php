<?php

namespace LaravelLiberu\Files;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelLiberu\Files\Models\File;
use LaravelLiberu\Files\Models\Upload;
use LaravelLiberu\Files\Policies\File as FilePolicy;
use LaravelLiberu\Files\Policies\Upload as UploadPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Upload::class => UploadPolicy::class,
        File::class => FilePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
