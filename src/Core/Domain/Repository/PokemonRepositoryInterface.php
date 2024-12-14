<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use Core\Domain\Entity\Pokemon;
use Core\Domain\Exception\PokemonsNotFoundException;

interface PokemonRepositoryInterface
{
    public function create(Pokemon $pokemon): Pokemon;

    /**
     * @throws PokemonsNotFoundException
     */
    public function findById(int $id): Pokemon;
}
