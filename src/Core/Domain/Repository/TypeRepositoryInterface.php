<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use Core\Domain\Entity\Type;

interface TypeRepositoryInterface
{
    /**
     * @param Type[] $types
     */
    public function createMany(array $types): void;
}
