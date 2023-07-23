<?php

declare(strict_types=1);

namespace App\Tests\orders\list\application;

use App\orders\list\application\OrdersLister;
use App\orders\list\application\response\OrderResponse;
use App\orders\list\application\response\OrdersResponse;
use App\orders\list\domain\exception\OrdersNotFoundException;
use App\orders\list\domain\Order;
use App\orders\list\domain\OrderRepository;
use PHPUnit\Framework\TestCase;

class OrdersListerTest extends TestCase
{
    public function test_should_return_list_of_orders(): void
    {
        $orderRespository = $this->createMock(OrderRepository::class);
        $orderRespository->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([
                new Order(1, 'order 1', 'mail1@mail.com', 'pending', 5.25),
                new Order(2, 'order 2', 'mail2@mail.com', 'pending',  10)
            ]);

        $ordersLister = new OrdersLister($orderRespository);
        $result = $ordersLister();

        self::assertInstanceOf(OrdersResponse::class, $result);
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $result->orders());
        self::assertEquals($result->orders()[0]->orderId(), 1);
        self::assertEquals($result->orders()[0]->name(), 'order 1');
        self::assertEquals($result->orders()[0]->totalPrice(), 5.25);
    }

    public function test_should_return_exception(): void
    {
        $this->expectException(OrdersNotFoundException::class);
        $orderRespository = $this->createMock(OrderRepository::class);
        $orderRespository
            ->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([]);

        $ordersLister = new OrdersLister($orderRespository);
        $result = $ordersLister();
    }
}
