<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Mysql;

use Core\Domain\Entity\Type;
use Core\Domain\Repository\TypeRepositoryInterface;
use Core\Infrastructure\Repository\Model\Type as TypeModel;

class TypeRepository implements TypeRepositoryInterface
{
    public function __construct(protected TypeModel $model) {
    }

    /**
     * @param Type[] $types
     */
    public function createMany(array $types): void
    {
        array_map(function ($type) {
            $this->model->firstOrCreate([
                'id' => $type->id,
                'name' => $type->name
            ]);
        }, $types);
    }
}
