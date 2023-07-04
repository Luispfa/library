<?php

declare(strict_types=1);

namespace App\orders\list\domain;

final class Order
{
    private $orderId;
    private $name;
    private $email;
    private $status;
    private $totalPrice;

    const STATUS_PENDING = 'Pending';
    const STATUS_CONFIRMED = 'Confirmed';
    const STATUS_SHIPPED = 'Shipped';
    const STATUS_DELIVERED = 'Delivered';

    public function __construct(
        int $orderId,
        string $name,
        string $email,
        string $status,
        float $totalPrice
    ) {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->email = $email;
        $this->status = $status;
        $this->totalPrice = $totalPrice;
    }

    public static function create(
        int $orderId,
        string $name,
        string $email,
    ): self {
        $status = self::STATUS_PENDING;
        $totalPrice = 0;
        return new self($orderId, $name, $email, $status, $totalPrice);
    }

    public function orderId(): int
    {
        return $this->orderId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function totalPrice(): float
    {
        return $this->totalPrice;
    }
}
