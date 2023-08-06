<?php

declare(strict_types=1);

namespace App\orders\list\application;

use App\orders\list\application\response\OrderResponse;
use App\orders\list\application\response\OrdersResponse;
use App\orders\list\domain\exception\OrdersNotFoundException;
use App\orders\list\domain\Order;
use App\orders\list\domain\OrderRepository;

use function Lambdish\Phunctional\map;

final readonly class OrdersLister
{
    public function __construct(private OrderRepository $orderRespository)
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
