<?php

namespace orders\list\infrastructure\repositories;

use orders\shared\domain\Order;
use orders\list\domain\OrdersListerRepository;

class InFileOrdersListerRepository implements OrdersListerRepository
{
    private array $orders = [];

    public function __construct()
    {
        $this->orders = [
            Order::create('1', 'order 1 in File', 'mail1@mail.com'),
            Order::create('2', 'order 2 in File', 'mail2@mail.com'),
            Order::create('3', 'order 3 in File', 'mail3@mail.com'),
            Order::create('4', 'order 4 in File', 'mail4@mail.com'),
        ];
    }

    public function searchAllOrders(): array
    {
        return $this->orders;
    }
}
