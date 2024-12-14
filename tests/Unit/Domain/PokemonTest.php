<?php

declare(strict_types=1);

namespace Tests\Unit\Domain;

use Core\Domain\Entity\Pokemon;
use Core\Domain\Entity\Type;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    public function testShouldCreatePokemon(): void
    {
        $pokemon = new Pokemon(
            id: 1,
            name: 'Pikachu',
            types: [
                new Type(
                    name: 'teste',
                    url: 'http://localhost:9501',
                ),
                new Type(
                    name: 'teste 2',
                    url: 'http://localhost:9501',
                ),
            ],
            height: 1.5,
            weight: 2.0
        );

        $this->assertInstanceOf(Pokemon::class, $pokemon);
        $this->assertEquals(1, $pokemon->id);
        $this->assertEquals('Pikachu', $pokemon->name);
        $this->assertEquals(1.5 / 100, $pokemon->height);
        $this->assertEquals(2.0 / 100, $pokemon->weight);
        $this->assertCount(2, $pokemon->toArray()['types']);
    }
}
