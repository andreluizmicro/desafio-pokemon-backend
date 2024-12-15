<?php

declare(strict_types=1);

namespace Core\Infrastructure\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonListResource extends JsonResource
{
    public function toArray($request): array
    {
        $data = $this->resource;

        return [
            'items' => $data->items,
            'meta' => [
                'count' => $data->count,
                'previous_page' => $data->previousPage,
                'next_page' => $this->resource->nextPage,
            ]
        ];
    }
}
