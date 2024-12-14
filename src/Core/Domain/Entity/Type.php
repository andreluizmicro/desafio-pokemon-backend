<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Exception\InvalidTypeException;

class Type
{
    /**
     * @throws InvalidTypeException
     */
    public function __construct(
        public int $id,
         public string $name
     ) {
         $this->validate();
     }

    /**
     * @throws InvalidTypeException
     */
    private function validate(): void
     {
         if (! $this->isValid()) {
            throw InvalidTypeException::invalidType();
         }
     }

     private function isValid(): bool
     {
         return strlen($this->name) >= 1;
     }

     public function toArray(): array
     {
         return [
             'id' => $this->id,
             'name' => $this->name,
         ];
     }
}
