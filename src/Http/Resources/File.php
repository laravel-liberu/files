<?php

namespace LaravelLiberu\Files\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LaravelLiberu\Helpers\Services\DiskSize;
use LaravelLiberu\Users\Http\Resources\User;

class File extends JsonResource
{
    public function toArray($request)
    {
        $accessible = $request->user()->can('access', $this->resource);

        return [
            'id' => $this->id,
            'name' => $this->name(),
            'extension' => $this->extension(),
            'size' => DiskSize::forHumans($this->size),
            'mimeType' => $this->mime_type,
            'type' => new Type($this->whenLoaded('type')),
            'owner' => new User($this->whenLoaded('createdBy')),
            'isFavorite' => (bool) $this->whenLoaded('favorite'),
            'isManageable' => $request->user()->can('manage', $this->resource),
            'isAccessible' => $accessible,
            'isPublic' => $this->is_public,
            'createdAt' => $this->created_at->toDatetimeString(),
        ];
    }
}
