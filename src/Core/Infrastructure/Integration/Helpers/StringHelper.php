<?php

declare(strict_types=1);

namespace Core\Infrastructure\Integration\Helpers;

class StringHelper
{
    public static function extractIdUrl(string $url): int
    {
        $url = rtrim($url, '/');

        $parts = explode('/', $url);

        return (int) end($parts);
    }
}
