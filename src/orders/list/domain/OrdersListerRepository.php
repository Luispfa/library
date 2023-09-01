<?php

declare(strict_types=1);

namespace orders\list\domain;

interface OrdersListerRepository
{
    public function searchAllOrders(): array;
}
