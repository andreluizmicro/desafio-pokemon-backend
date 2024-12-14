<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

class PokemonType
{
    public function __construct(
        public ?int $id = null,
        public string $name,
    ) {
    }
}
