<?php

declare(strict_types=1);

namespace Core\Infrastructure\Integration\External;

use Core\Application\Dtos\PokemonsListDto;
use Core\Domain\Entity\Pokemon;
use Core\Domain\Entity\Type;
use Core\Domain\Exception\InvalidTypeException;
use Core\Domain\Exception\PokemonClientErrorException;
use Core\Domain\Exception\PokemonsNotFoundException;
use Core\Domain\Integration\External\PokemonApiGatewayInterface;
use Core\Infrastructure\Client\PokemonClient;
use Core\Infrastructure\Integration\Helpers\StringHelper;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stdClass;
use Throwable;

readonly class PokemonApiGateway implements PokemonApiGatewayInterface
{
    public function __construct(private PokemonClient $client)
    {
    }

    /**
     * @throws GuzzleException
     * @throws Throwable
     */
    public function listPokemons(int $limit, int $offset): PokemonsListDto
    {
        try {
            $response = $this->client
                ->getClient()
                ->get(sprintf('https://pokeapi.co/api/v2/pokemon?offset=%d&limit=%d', $offset, $limit));

            $data = json_decode($response->getBody()->getContents());

            return $this->buildListOutputDto($data);
        } catch (Throwable $exception) {
            throw new $exception;
        }
    }

   private function buildListOutputDto(stdClass $data): PokemonsListDto
   {
       return new PokemonsListDto(
           items: array_map(function ($result) {
               return [
                   'id' => StringHelper::extractIdUrl($result->url),
                   'name' => $result->name,
               ];
           }, $data->results),
           count: $data->count,
           previousPage: $data->previous ?? null,
           nextPage: $data->next ?? null
       );
   }

    /**
     * @throws PokemonClientErrorException
     * @throws PokemonsNotFoundException
     * @throws Exception
     */
    public function fetchPokemon(int $id): Pokemon
    {
        try {
            $response = $this->client
                ->getClient()
                ->get(sprintf('https://pokeapi.co/api/v2/pokemon/%d', $id));

            $data = json_decode($response->getBody()->getContents());

            return $this->toEntity($data);
        } catch (GuzzleException){
            throw new PokemonClientErrorException();
        } catch (Throwable $exception) {
            if ($exception->getCode() === 404) {
                throw new PokemonsNotFoundException();
            }
            throw new Exception();
        }
    }

    /**
     * @throws InvalidTypeException
     */
    private function toEntity(stdClass $data): Pokemon
    {
        return new Pokemon(
            id: $data->id,
            name: $data->name,
            types: array_map(function($data) {
                return new Type(
                    id: StringHelper::extractIdUrl($data->type->url),
                    name: $data->type->name
                );
            }, $data->types),
            height: $data->weight,
            weight: $data->weight,
        );
    }
}
