<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\ListPokemon;

use Core\Domain\Integration\External\PokemonApiGatewayInterface;

class ListPokemonsUseCase
{
    public function __construct(
        protected PokemonApiGatewayInterface $pokemonApiGateway,
    ) {
    }

    public function execute(ListPokemonsInputDto $inputDto): ListPokemonsOutputDto
    {
        $pokemonsListDto = $this->pokemonApiGateway->listPokemons(
            limit: $inputDto->limit,
            offset: $inputDto->offset,
        );

        return new ListPokemonsOutputDto(
            items: $pokemonsListDto->items,
            count: $pokemonsListDto->count,
            previousPage: $pokemonsListDto->previousPage,
            nextPage: $pokemonsListDto->nextPage,
        );
    }
}
