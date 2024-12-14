<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\ListPokemon;

class ListPokemonsInputDto
{
    public function __construct(
        public ?int $offset = 0,
        public ?int $limit = 10,
    ) {
    }
}
