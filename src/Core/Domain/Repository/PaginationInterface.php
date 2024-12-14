<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use stdClass;

interface PaginationInterface
{
    /**
     * @return stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function offset(): int;
    public function limit(): int;
}
