<?php

declare(strict_types=1);

namespace App\orders\list\application\response;

final class OrderResponse
{
    private $orderId;
    private $name;
    private $totalPrice;

    public function __construct(
        int $orderId,
        string $name,
        float $totalPrice
    ) {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->totalPrice = $totalPrice;
    }

    public function orderId(): int
    {
        return $this->orderId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function totalPrice(): float
    {
        return $this->totalPrice;
    }
}
