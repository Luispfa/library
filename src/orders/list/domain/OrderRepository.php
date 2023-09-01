<?php

declare(strict_types=1);

namespace orders\list\domain;

interface OrderRepository
{
    /** @var Order[] */
    public function searchAllOrders(): array;
}
