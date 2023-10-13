<?php

namespace LaravelLiberu\Files\Services;

use Illuminate\Support\Facades\Validator;
use LaravelLiberu\ImageTransformer\Services\ImageTransformer;
use Symfony\Component\HttpFoundation\File\File;

class ImageProcessor
{
    private ImageTransformer $transformer;

    public function __construct(
        private File $file,
        private bool $optimize,
        private array $resize
    ) {
    }

    public function handle(): void
    {
        if ($this->isImage()) {
            if (! empty($this->resize)) {
                $this->transformer()
                    ->width($this->resize['width'])
                    ->height($this->resize['height']);
            }

            if ($this->optimize) {
                $this->transformer()->optimize();
            }
        }
    }

    private function isImage(): bool
    {
        return Validator::make(
            ['file' => $this->file],
            ['file' => 'image|mimetypes:'.implode(',', ImageTransformer::SupportedMimeTypes)]
        )->passes();
    }

    private function transformer()
    {
        return $this->transformer ??= new ImageTransformer($this->file);
    }
}
