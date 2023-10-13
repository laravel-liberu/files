<?php

namespace LaravelLiberu\Files\Contracts;

interface ResizesImages
{
    public function imageWidth(): ?int;

    public function imageHeight(): ?int;
}
