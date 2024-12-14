<?php

declare(strict_types=1);

namespace Core\Application\Dtos;

class PokemonsListDto
{
    public function __construct(
        public array $items,
        public int $count,
        public ?string $previousPage = null,
        public ?string $nextPage = null,
    ) {
    }
}
