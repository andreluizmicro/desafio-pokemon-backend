<?php

namespace Core\Domain\Exception;

use Exception;

class PokemonTypesNotFoundException extends Exception
{
    public static function notFound(): self
    {
        return new self('Pokemon types not found');
    }
}
