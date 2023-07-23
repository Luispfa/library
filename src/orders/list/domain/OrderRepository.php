<?php

declare(strict_types=1);

namespace App\orders\list\domain;

interface OrderRepository
{
    /** @var Order[] */
    public function searchAllOrders(): array;
}
