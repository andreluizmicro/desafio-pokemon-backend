<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Mysql;

use Core\Domain\Entity\Pokemon;
use Core\Domain\Exception\PokemonsNotFoundException;
use Core\Domain\Repository\PokemonRepositoryInterface;
use Core\Infrastructure\Repository\Model\Pokemon as PokemonModel;
use Throwable;

class PokemonRepository implements PokemonRepositoryInterface
{
    public function __construct(protected PokemonModel $model)
    {
    }

    public function create(Pokemon $pokemon): Pokemon
    {
        $pokemon = $this->model->create([
            'id' => $pokemon->id(),
            'name' => $pokemon->name(),
            'height' => $pokemon->height(),
            'weight' => $pokemon->weight(),
        ]);

        return $this->toEntity($pokemon->toArray());
    }

    /**
     * @throws PokemonsNotFoundException
     */
    public function findById(int $id): Pokemon
    {
        try {
            $result = $this->model->where(['id' => $id])->find($id);

            return $this->toEntity($result->toArray());
        } catch (Throwable) {
            throw new PokemonsNotFoundException('Pokemon not found');
        }
    }

    private function toEntity(array $data): Pokemon
    {
        return new Pokemon(
            id: $data['id'],
            name: $data['name'],
            types: [],
            height: $data['height'],
            weight: $data['weight'],
        );
    }
}
