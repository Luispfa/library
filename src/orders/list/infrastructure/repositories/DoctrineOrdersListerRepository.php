<?php

namespace orders\list\infrastructure\repositories;

use orders\shared\domain\Order;
use orders\list\domain\OrdersListerRepository;
use orders\list\infrastructure\repositories\persistence\doctrine\DoctrineRepository;

class DoctrineOrdersListerRepository extends DoctrineRepository implements OrdersListerRepository
{
    public function searchAllOrders(): array
    {
        return $this->searchAll(Order::class);
    }
}
