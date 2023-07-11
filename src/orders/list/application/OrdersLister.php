<?php

declare(strict_types=1);

namespace App\orders\list\application;

use App\orders\list\application\response\OrderResponse;
use App\orders\list\domain\exceptions\OrdersNotExistsException;
use App\orders\list\domain\OrderRepository;

final class OrdersLister
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function __invoke(): array
    {
        $orders = $this->orderRepository->searchAllOrders();
        if (empty($orders)) {
            throw new OrdersNotExistsException();
        }

        $ordersResponse = [];
        foreach ($orders as $order) {
            $ordersResponse[] = new OrderResponse($order->orderId(), $order->name(), $order->totalPrice());
        }

        return $ordersResponse;
    }
}
