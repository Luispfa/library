<?php

declare(strict_types=1);

namespace App\Tests\orders\list\application;

use orders\list\application\OrdersLister;
use orders\list\application\response\OrderResponse;
use orders\list\application\response\OrdersResponse;
use orders\shared\domain\exception\OrdersNotFoundException;
use orders\shared\domain\Order;
use orders\shared\domain\OrderEmail;
use orders\shared\domain\OrderName;
use orders\list\domain\OrdersListerRepository;
use orders\shared\domain\OrderId;
use PHPUnit\Framework\TestCase;

class OrdersListerTest extends TestCase
{
    public function test_should_return_list_of_orders(): void
    {
        $orderRespository = $this->createMock(OrdersListerRepository::class);
        $orderRespository->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([
                Order::create(
                    new OrderId('2b345f97-af90-419c-9d29-13420af52879'),
                    new OrderName('order 1'),
                    new OrderEmail('mail1@mail.com')
                ),
                Order::create(
                    new OrderId('8e707df4-1b30-41a4-887a-bb3abb83c929'),
                    new OrderName('order 2'),
                    new OrderEmail('mail2@mail.com')
                )
            ]);

        $ordersLister = new OrdersLister($orderRespository);
        $result = $ordersLister();

        self::assertInstanceOf(OrdersResponse::class, $result);
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $result->orders());
        self::assertEquals($result->orders()[0]->id, '2b345f97-af90-419c-9d29-13420af52879');
        self::assertEquals($result->orders()[1]->id, '8e707df4-1b30-41a4-887a-bb3abb83c929');
        self::assertEquals($result->orders()[0]->name, 'order 1');
        self::assertEquals($result->orders()[0]->totalPrice, 0);
    }

    public function test_should_return_exception(): void
    {
        $this->expectException(OrdersNotFoundException::class);
        $orderRespository = $this->createMock(OrdersListerRepository::class);
        $orderRespository
            ->expects(self::once())
            ->method('searchAllOrders')
            ->with()
            ->willReturn([]);

        $ordersLister = new OrdersLister($orderRespository);
        $ordersLister();
    }
}
