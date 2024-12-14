<?php

namespace Core\Domain\Exception;

use Exception;

class PokemonsNotFoundException extends Exception
{
    public static function notFound(): self
    {
        return new self('Pokemon not found');
    }
}
