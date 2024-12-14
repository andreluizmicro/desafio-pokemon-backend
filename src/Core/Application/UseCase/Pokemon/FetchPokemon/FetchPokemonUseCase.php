<?php

declare(strict_types=1);

namespace Core\Application\UseCase\Pokemon\FetchPokemon;

use Core\Domain\Entity\Pokemon;
use Core\Domain\Exception\PokemonsNotFoundException;
use Core\Domain\Integration\External\PokemonApiGatewayInterface;
use Core\Domain\Repository\PokemonRepositoryInterface;
use Core\Domain\Repository\TypeRepositoryInterface;
use Core\Domain\Repository\TransactionInterface;
use Throwable;

class FetchPokemonUseCase
{
    public function __construct(
        protected PokemonApiGatewayInterface $pokemonApiGateway,
        protected PokemonRepositoryInterface $pokemonRepository,
        protected TypeRepositoryInterface    $pokemonTypeRepository,
        protected TransactionInterface       $transaction,
    ) {
    }

    /**
     * @throws Throwable
     */
    public function execute(FetchPokemonInputDto $inputDto): FetchPokemonOutputDto
    {
        try {
            $pokemonFound = $this->findPokemon($inputDto->id);

            if (! is_null($pokemonFound)) {
                return $this->buildOutputDto($pokemonFound);
            }

            $pokemon = $this->pokemonApiGateway->fetchPokemon($inputDto->id);

            dd($this->pokemonTypeRepository->list());

            $pokemonCreated = $this->pokemonRepository->create($pokemon);

            $this->transaction->commit();

            return $this->buildOutputDto($pokemonCreated);
        } catch (Throwable $exception) {
            $this->transaction->rollback();
            throw $exception;
        }
    }

    private function findPokemon(int $id): ?Pokemon
    {
        try {
            return $this->pokemonRepository->findById($id);
        } catch (PokemonsNotFoundException) {
            return null;
        }
    }

    private function buildOutputDto(Pokemon $pokemon): FetchPokemonOutputDto
    {
        return new FetchPokemonOutputDto(
            id: $pokemon->id(),
            name: $pokemon->name(),
            types: $pokemon->types(),
            height: $pokemon->height(),
            weight: $pokemon->weight()
        );
    }
}
