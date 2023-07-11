<?php

declare(strict_types=1);

namespace App\orders\list\application;

use App\orders\list\application\response\OrderResponse;
use App\orders\list\application\response\OrdersResponse;
use App\orders\list\domain\exceptions\OrdersNotExistsException;
use App\orders\list\domain\Order;
use App\orders\list\domain\OrderRepository;
use function Lambdish\Phunctional\map;

final class OrdersLister
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function __invoke(): OrdersResponse
    {
        $orders = $this->orderRepository->searchAllOrders();
        if (empty($orders)) {
            throw new OrdersNotExistsException();
        }

        return new OrdersResponse(...map($this->toResponse(), $orders));
    }

    private function toResponse(): callable
    {
        return static function (Order $order) {
            return new OrderResponse($order->orderId(), $order->name(), $order->totalPrice());
        };
    }
}
