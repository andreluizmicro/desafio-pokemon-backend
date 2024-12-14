<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use Illuminate\Database\Eloquent\Collection;

interface TypeRepositoryInterface
{
    public function list(): Collection;
}
