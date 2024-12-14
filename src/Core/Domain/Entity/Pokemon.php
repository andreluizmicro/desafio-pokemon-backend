<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

class Pokemon
{
    /**
     * @param Type[] $types
     */
    public function __construct(
        public int $id,
        public string $name,
        public array $types,
        public float  $height,
        public float  $weight,
    )
    {
        $this->changeHeight();
        $this->changeWeight();
    }

    private function changeHeight(): void
    {
        $this->height = $this->height / 100;
    }

    private function changeWeight(): void
    {
        $this->weight = $this->weight / 100;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function types(): ?array
    {
        return $this?->types;
    }
    public function height(): float
    {
        return $this->height;
    }

    public function weight(): float
    {
        return $this->weight;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->Id(),
            'name' => $this->name(),
            'types' => array_map(fn(Type $type) => $type->toArray(), $this->types()),
            'height' => $this->height(),
            'weight' => $this->weight(),
        ];
    }
}
