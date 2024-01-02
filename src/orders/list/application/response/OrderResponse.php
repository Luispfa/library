<?php

declare(strict_types=1);

namespace orders\list\application\response;

final readonly class OrderResponse
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $status,
        public float $totalPrice
    ) {
    }
}
