<?php

declare(strict_types=1);

namespace App\orders\list\domain;

enum Status: string
{
    case PENDING = 'Pending';
    case CONFIRMED = 'Confirmed';
    case SHIPPED = 'Shipped';
    case DELIVERED = 'Delivered';
}

final readonly class Order
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public Status $status,
        public float $totalPrice
    ) {
    }

    public static function create(
        int $id,
        string $name,
        string $email,
    ): self {
        $status = Status::PENDING;
        $totalPrice = 0;
        return new self($id, $name, $email, $status, $totalPrice);
    }
}
