<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\FetchPokemon;

class FetchPokemonOutputDto
{
    public function __construct(
        public int $id,
        public string $name,
        public array $types,
        public float $height,
        public float $weight,
    ) {
    }
}
