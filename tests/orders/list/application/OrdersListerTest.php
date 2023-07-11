<?php

declare(strict_types=1);

namespace App\Tests\orders\list\application;

use App\orders\list\application\OrdersLister;
use App\orders\list\application\response\OrderResponse;
use App\orders\list\domain\exceptions\OrdersNotExistsException;
use App\orders\list\domain\OrderRepository;
use PHPUnit\Framework\TestCase;

final class OrdersListerTest extends TestCase
{
    public function test_should_return_array_of_orders(): void
    {
        $mockOrderRespository = $this->createMock(OrderRepository::class);
        $mockOrderRespository->expects($this->once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([
                new OrderResponse(1, 'order 1',  5.25),
                new OrderResponse(2, 'order 2',  10)
            ]);

        $ordersLister = new OrdersLister($mockOrderRespository);
        $result = $ordersLister();

        self::assertIsArray($result);
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $result);
        self::assertEquals($result[0]->orderId(), 1);
        self::assertEquals($result[1]->orderId(), 2);
        self::assertEquals($result[0]->totalPrice(), 5.25);
        self::assertEquals($result[1]->totalPrice(), 10);
    }

    public function test_should_return_exception(): void
    {
        $this->expectException(OrdersNotExistsException::class);
        $mockOrderRespository = $this->createMock(OrderRepository::class);
        $mockOrderRespository->expects($this->once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([]);

        $ordersLister = new OrdersLister($mockOrderRespository);
        $result = $ordersLister();
    }
}
