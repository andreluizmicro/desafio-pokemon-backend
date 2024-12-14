<?php

declare(strict_types=1);

namespace Core\Application\Dtos;

use Core\Domain\Entity\PokemonType;

class PokemonTypesDto
{
    /**
     * @param PokemonType[] $types
     */
    public function __construct(
      public ?array $types = [],
    ) {
    }
}
