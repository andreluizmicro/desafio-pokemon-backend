<?php

declare(strict_types=1);

namespace Core\Domain\Integration\External;
use Core\Application\Dtos\PokemonsListDto;
use Core\Domain\Entity\Pokemon;

interface PokemonApiGatewayInterface
{
    public function listPokemons(int $limit, int $offset): PokemonsListDto;

    public function fetchPokemon(int $id): Pokemon;
}
