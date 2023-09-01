<?php

declare(strict_types=1);

namespace orders\list\application;

use orders\list\application\response\OrderResponse;
use orders\list\application\response\OrdersResponse;
use orders\list\domain\exception\OrdersNotFoundException;
use orders\list\domain\Order;
use orders\list\domain\OrdersListerRepository;

use function Lambdish\Phunctional\map;

final readonly class OrdersLister
{
    public function __construct(private OrdersListerRepository $orderRespository)
    {
    }

    public function __invoke(): OrdersResponse
    {
        $orders = $this->orderRespository->searchAllOrders();
        if (empty($orders)) {
            throw new OrdersNotFoundException();
        }

        return new OrdersResponse(...map($this->toResponse(), $orders));
    }

    private function toResponse(): callable
    {
        return static fn (Order $order) => new OrderResponse(
            $order->id,
            $order->name,
            $order->totalPrice
        );
    }
}
