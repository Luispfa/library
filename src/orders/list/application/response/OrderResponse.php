<?php

declare(strict_types=1);

namespace App\orders\list\application\response;

final readonly class OrderResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public float $totalPrice
    ) {
    }
}
