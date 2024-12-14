<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Mysql;

use Core\Domain\Repository\TypeRepositoryInterface;
use Core\Infrastructure\Repository\Model\Type;
use Illuminate\Database\Eloquent\Collection;

class TypeRepository implements TypeRepositoryInterface
{
    public function __construct(protected Type $model) {
    }

    public function list(): Collection
    {
        return $this->model->all();
    }
}
