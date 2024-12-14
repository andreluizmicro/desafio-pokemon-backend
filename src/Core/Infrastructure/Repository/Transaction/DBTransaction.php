<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Transaction;

use Core\Domain\Repository\TransactionInterface;
use Illuminate\Support\Facades\DB;

class DBTransaction implements TransactionInterface
{

    public function __construct()
    {
        DB::beginTransaction();
    }

    public function commit(): void
    {
        DB::commit();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }
}
