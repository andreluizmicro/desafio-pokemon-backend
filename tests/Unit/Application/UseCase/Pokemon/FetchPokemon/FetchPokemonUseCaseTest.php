<?php

declare(strict_types=1);

namespace Tests\Unit\Application\UseCase\Pokemon\FetchPokemon;

use Core\Application\UseCase\Pokemon\FetchPokemon\FetchPokemonInputDto;
use Core\Application\UseCase\Pokemon\FetchPokemon\FetchPokemonOutputDto;
use Core\Application\UseCase\Pokemon\FetchPokemon\FetchPokemonUseCase;
use Core\Domain\Integration\External\PokemonApiGatewayInterface;
use Core\Domain\Repository\PokemonRepositoryInterface;
use Tests\TestCase;

class FetchPokemonUseCaseTest extends TestCase
{
    private FetchPokemonInputDto $input;
    private FetchPokemonOutputDto $output;
    private FetchPokemonUseCase $fetchPokemonUseCase;

    private PokemonApiGatewayInterface $pokemonApiGateway;
    private PokemonRepositoryInterface $pokemonRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->input = $this->createMock(FetchPokemonInputDto::class);
        $this->output = $this->createMock(FetchPokemonOutputDto::class);

        $this->pokemonApiGateway = $this->createMock(PokemonApiGatewayInterface::class);
        $this->pokemonRepository = $this->createMock(PokemonRepositoryInterface::class);

        $this->fetchPokemonUseCase = new FetchPokemonUseCase(
            $this->pokemonApiGateway,
            $this->pokemonRepository
        );
    }

    public function testShouldReturnPokemon(): void
    {

    }
}
