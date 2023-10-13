<?php

namespace LaravelLiberu\Files\Database\Seeders;

use Illuminate\Database\Seeder;
use LaravelLiberu\Avatars\Models\Avatar;
use LaravelLiberu\DataExport\Models\Export;
use LaravelLiberu\DataImport\Models\Import;
use LaravelLiberu\DataImport\Models\RejectedImport;
use LaravelLiberu\Documents\Models\Document;
use LaravelLiberu\Files\Models\Type;
use LaravelLiberu\Files\Models\Upload;
use LaravelLiberu\HowTo\Models\Poster;
use LaravelLiberu\HowTo\Models\Video;
use LaravelLiberu\Products\Models\Picture;
use LaravelLiberu\Webshop\Models\Brand;
use LaravelLiberu\Webshop\Models\CarouselSlide;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $this->avatars()
            ->recents()
            ->favorites()
            ->uploads()
            ->exports()
            ->imports()
            ->rejectedImports()
            ->documents()
            ->productPictures()
            ->brands()
            ->carouselSlides()
            ->howToPosters()
            ->howToVideos();
    }

    private function avatars(): self
    {
        Type::factory()->model(Avatar::class)->create();

        return $this;
    }

    private function recents(): self
    {
        Type::factory()->create([
            'name' => 'Recents',
            'folder' => null,
            'model' => null,
            'icon' => 'folder-plus',
            'endpoint' => 'recent',
            'description' => 'Recent files',
            'is_browsable' => true,
            'is_system' => true,
        ]);

        return $this;
    }

    private function favorites(): self
    {
        Type::factory()->create([
            'name' => 'Favorites',
            'folder' => null,
            'model' => null,
            'icon' => 'star',
            'endpoint' => 'favorites',
            'description' => 'User Favorites',
            'is_browsable' => true,
            'is_system' => true,
        ]);

        return $this;
    }

    private function uploads(): self
    {
        Type::factory()->model(Upload::class)->create([
            'name' => 'Uploads',
            'icon' => 'file-upload',
            'is_browsable' => true,
            'is_system' => false,
        ]);

        return $this;
    }

    private function exports(): self
    {
        Type::factory()->model(Export::class)->create([
            'icon' => 'file-export',
            'is_browsable' => true,
            'is_system' => false,
        ]);

        return $this;
    }

    private function imports(): self
    {
        if (class_exists(Import::class)) {
            Type::factory()->model(Import::class)->create([
                'icon' => 'file-import',
                'is_browsable' => true,
            ]);
        }

        return $this;
    }

    private function rejectedImports(): self
    {
        if (class_exists(RejectedImport::class)) {
            Type::factory()->model(RejectedImport::class)->create([
                'icon' => 'exclamation-triangle',
                'is_browsable' => true,
            ]);
        }

        return $this;
    }

    private function documents(): self
    {
        if (class_exists(Document::class)) {
            Type::factory()->model(Document::class)->create([
                'icon' => 'file-contract',
                'is_browsable' => true,
            ]);
        }

        return $this;
    }

    private function productPictures(): self
    {
        if (class_exists(Picture::class)) {
            Type::factory()->model(Picture::class)->create([
                'icon' => 'image',
                'is_browsable' => true,
            ]);
        }

        return $this;
    }

    private function brands(): self
    {
        if (class_exists(Brand::class)) {
            Type::factory()->model(Brand::class)->create([
                'is_browsable' => true,
                'icon' => 'copyright',
            ]);
        }

        return $this;
    }

    private function carouselSlides(): self
    {
        if (class_exists(CarouselSlide::class)) {
            Type::factory()->model(CarouselSlide::class)->create();
        }

        return $this;
    }

    private function howToPosters(): self
    {
        if (class_exists(Poster::class)) {
            Type::factory()->model(Poster::class)->create();
        }

        return $this;
    }

    private function howToVideos(): self
    {
        if (class_exists(Video::class)) {
            Type::factory()->model(Video::class)->create();
        }

        return $this;
    }
}
