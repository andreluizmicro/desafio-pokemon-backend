<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

interface TransactionInterface
{
    public function commit();
    public function rollback();
}
