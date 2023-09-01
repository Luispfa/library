<?php

declare(strict_types=1);

namespace App\Tests\orders\list\application;

use orders\list\application\OrdersLister;
use orders\list\application\response\OrderResponse;
use orders\list\application\response\OrdersResponse;
use orders\list\domain\exception\OrdersNotFoundException;
use orders\list\domain\Order;
use orders\list\domain\OrderRepository;
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
                Order::create(1, 'order 1', 'mail1@mail.com'),
                Order::create(2, 'order 2', 'mail2@mail.com')
            ]);

        $ordersLister = new OrdersLister($orderRespository);
        $result = $ordersLister();

        self::assertInstanceOf(OrdersResponse::class, $result);
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $result->orders());
        self::assertEquals($result->orders()[0]->id, 1);
        self::assertEquals($result->orders()[0]->name, 'order 1');
        self::assertEquals($result->orders()[0]->totalPrice, 0);
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
        $ordersLister();
    }
}
