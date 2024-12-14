<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Mysql;

use Core\Domain\Entity\Pokemon;
use Core\Domain\Exception\PokemonsNotFoundException;
use Core\Domain\Repository\PokemonRepositoryInterface;
use Core\Infrastructure\Repository\Model\Pokemon as PokemonModel;
use Core\Infrastructure\Repository\Model\Type;
use Throwable;

class PokemonRepository implements PokemonRepositoryInterface
{
    public function __construct(protected PokemonModel $model)
    {
    }

    public function create(Pokemon $pokemon): Pokemon
    {
        dd($pokemon);

        $pokemon = $this->model->create([
            'name' => $pokemon->name(),
            'type' => $pokemon->type(),
            'height' => $pokemon->height(),
            'weight' => $pokemon->weight(),
        ]);

        dd($pokemon);

        return $pokemon->id;
    }

    /**
     * @throws PokemonsNotFoundException
     */
    public function findById(int $id): Pokemon
    {
        try {
            return $this->model->find($id);
        } catch (Throwable) {
            throw new PokemonsNotFoundException('Pokemon not found');
        }
    }


}
