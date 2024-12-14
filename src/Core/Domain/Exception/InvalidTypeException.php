<?php

declare(strict_types=1);

namespace Core\Domain\Exception;

use Exception;

class InvalidTypeException extends Exception
{
    public static function invalidType(): self
    {
        return new self('Invalid type', 400);
    }
}
