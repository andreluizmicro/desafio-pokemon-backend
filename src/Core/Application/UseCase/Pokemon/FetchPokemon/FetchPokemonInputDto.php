<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\FetchPokemon;
class FetchPokemonInputDto
{
    public function __construct(
        public int $id,
    ) {
    }
}
