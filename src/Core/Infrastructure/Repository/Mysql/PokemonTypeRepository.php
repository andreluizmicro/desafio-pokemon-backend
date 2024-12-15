<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Mysql;

use Core\Application\Dtos\PokemonTypesDto;
use Core\Domain\Entity\PokemonType;
use Core\Domain\Repository\PokemonTypeRepositoryInterface;
use Core\Infrastructure\Repository\Model\PokemonType as PokemonTypeModel;

class PokemonTypeRepository implements PokemonTypeRepositoryInterface
{
    public function __construct(protected PokemonTypeModel $model) {
    }

    public function createMany(int $pokemonId, array $types): void
    {
        array_map(function($type) use ($pokemonId) {
            $this->model->create([
                'pokemon_id' => $pokemonId,
                'type_id' => $type->id,
            ]);
        }, $types);
    }

    public function findByPokemonId(int $pokemonId): PokemonTypesDto
    {
        $pokemonTypes = $this->model
            ->with('type')
            ->where('pokemon_id', $pokemonId)
            ->get();

        return new PokemonTypesDto(
            types: array_map(function (PokemonTypeModel $type) {
                return new PokemonType(
                    id: $type->toArray()['type']['id'],
                    name: $type->toArray()['type']['name']
                );
            }, iterator_to_array($pokemonTypes)),
        );

    }
}
