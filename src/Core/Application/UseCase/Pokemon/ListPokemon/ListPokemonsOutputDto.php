<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\ListPokemon;

class ListPokemonsOutputDto
{
    public function __construct(
        public array $items,
        public int $count,
        public ?string $previousPage = null,
        public ?string $nextPage = null,
    ) {
    }
}
