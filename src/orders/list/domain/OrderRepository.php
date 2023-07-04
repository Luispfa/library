<?php

declare(strict_types=1);

namespace App\orders\list\domain;

interface OrderRepository
{
    public function searchAllOrders(): array;
}
