<?php

declare(strict_types=1);

namespace orders\list\domain;

final readonly class Order
{
    private function __construct(
        public string $id,
        public string $name,
        public string $email,
        public StatusEnum $status,
        public float $totalPrice
    ) {
    }

    public static function create(
        string $id,
        string $name,
        string $email,
    ): self {
        $status = StatusEnum::PENDING;
        $totalPrice = 0;
        return new self($id, $name, $email, $status, $totalPrice);
    }
}
