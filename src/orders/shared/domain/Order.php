<?php

declare(strict_types=1);

namespace orders\shared\domain;

final readonly class Order
{
    const PENDING = 'Pending';
    const CONFIRMED = 'Confirmed';
    const SHIPPED = 'Shipped';
    const DELIVERED = 'Delivered';

    private function __construct(
        public string $id,
        public OrderName $name,
        public OrderEmail $email,
        public string $status,
        public OrderTotalPrice $totalPrice
    ) {
    }

    public static function create(
        string $id,
        OrderName $name,
        OrderEmail $email,
    ): self {
        $status = static::PENDING;
        $totalPrice = OrderTotalPrice::initialize();
        return new self($id, $name, $email, $status, $totalPrice);
    }
}
