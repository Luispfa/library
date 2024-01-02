<?php

declare(strict_types=1);

namespace orders\shared\domain;

final readonly class Order
{
    private function __construct(
        public OrderId $id,
        public OrderName $name,
        public OrderEmail $email,
        public OrderStatus $status,
        public OrderTotalPrice $totalPrice
    ) {
    }

    public static function create(
        OrderId $id,
        OrderName $name,
        OrderEmail $email,
    ): self {
        $status = OrderStatus::initialize();
        $totalPrice = OrderTotalPrice::initialize();
        return new self($id, $name, $email, $status, $totalPrice);
    }
}
