<?php

namespace LaravelLiberu\Files\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use LaravelLiberu\Files\Contracts\Attachable;
use LaravelLiberu\Files\Contracts\Extensions;
use LaravelLiberu\Files\Contracts\MimeTypes;
use LaravelLiberu\Files\Contracts\OptimizesImages;
use LaravelLiberu\Files\Contracts\ResizesImages;
use LaravelLiberu\Files\Models\File;
use LaravelLiberu\Files\Models\Type;
use LaravelLiberu\ImageTransformer\Services\ImageTransformer;

class Upload
{
    private Type $type;

    public function __construct(
        private Attachable $attachable,
        private UploadedFile $file
    ) {
        $this->type = Type::for($this->attachable::class);
    }

    public function handle(): File
    {
        return $this->validate()
            ->process()
            ->upload();
    }

    private function validate(): self
    {
        $validator = new Validate($this->file);

        if ($this->attachable instanceof Extensions) {
            $validator->extensions($this->attachable->extensions());
        }

        if ($this->attachable instanceof MimeTypes) {
            $validator->mimeTypes($this->attachable->mimeTypes());
        }

        $validator->handle();

        return $this;
    }

    private function process(): self
    {
        if (! $this->isSupportedImage()) {
            return $this;
        }

        if ($this->attachable instanceof ResizesImages) {
            $processor = (new Process($this->file))
                ->width($this->attachable->imageWidth())
                ->height($this->attachable->imageHeight());
        }

        if ($this->attachable instanceof OptimizesImages) {
            $processor ??= new Process($this->file);
            $processor->optimize();
        }

        if (isset($processor)) {
            $processor->handle();
        }

        return $this;
    }

    private function upload(): File
    {
        $folder = $this->folder();

        $model = File::create([
            'type_id' => $this->type->id,
            'original_name' => $this->file->getClientOriginalName(),
            'saved_name' => $this->file->hashName(),
            'size' => $this->file->getSize(),
            'mime_type' => $this->file->getMimeType(),
            'is_public' => $this->type->isPublic(),
        ]);

        $this->file->store($folder);

        return $model;
    }

    private function folder()
    {
        $folder = App::runningUnitTests()
            ? Config::get('liberu.files.testingFolder')
            : Type::for($this->attachable::class)->folder;

        if (! Storage::has($folder)) {
            Storage::makeDirectory($folder);
        }

        return $folder;
    }

    private function isSupportedImage(): bool
    {
        return Collection::wrap(ImageTransformer::SupportedMimeTypes)
            ->contains($this->file->getMimeType());
    }
}
