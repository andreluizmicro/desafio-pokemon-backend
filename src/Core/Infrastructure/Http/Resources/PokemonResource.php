<?php

declare(strict_types=1);

namespace Core\Infrastructure\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'type' => $this->resource->types,
            'height' => $this->resource->height,
            'weight' => $this->resource->weight,
        ];
    }
}
