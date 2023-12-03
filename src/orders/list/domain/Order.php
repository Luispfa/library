<?php

declare(strict_types=1);

namespace orders\list\domain;

final readonly class Order
{
    const PENDING = 'Pending';
    const CONFIRMED = 'Confirmed';
    const SHIPPED = 'Shipped';
    const DELIVERED = 'Delivered';

    private function __construct(
        public string $id,
        public OrderName $name,
        public string $email,
        public string $status,
        public float $totalPrice
    ) {
    }

    public static function create(
        string $id,
        OrderName $name,
        string $email,
    ): self {
        $status = static::PENDING;
        $totalPrice = 0;
        return new self($id, $name, $email, $status, $totalPrice);
    }
}
