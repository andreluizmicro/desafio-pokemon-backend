<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use Core\Application\Dtos\PokemonTypesDto;
use Core\Domain\Exception\PokemonTypesNotFoundException;

interface PokemonTypeRepositoryInterface
{
    public function createMany(int $pokemonId, array $types): void;

    /**
     * @throws PokemonTypesNotFoundException
     */
    public function findByPokemonId(int $pokemonId): PokemonTypesDto;
}
