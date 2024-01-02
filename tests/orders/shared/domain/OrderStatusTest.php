<?php

declare(strict_types=1);

namespace App\Tests\orders\list\domain;

use orders\shared\domain\OrderStatus;
use orders\shared\domain\StatusEnum;
use PHPUnit\Framework\TestCase;

final class OrderStatusTest extends TestCase
{
    public function test_can_be_initialized(): void
    {
        $orderStatus = OrderStatus::initialize();
        self::assertEquals(StatusEnum::PENDING->value, $orderStatus->value());
    }

    public function test_can_get_value(): void
    {
        $orderStatus = OrderStatus::create(StatusEnum::CONFIRMED->value);
        self::assertEquals(StatusEnum::CONFIRMED->value, $orderStatus->value());
    }

    public function test_can_check_equality(): void
    {
        $firstOrderStatus = OrderStatus::create(StatusEnum::SHIPPED->value);
        $secondOrderStatus = OrderStatus::create(StatusEnum::SHIPPED->value);
        $thirdOrderStatus = OrderStatus::create(StatusEnum::DELIVERED->value);

        self::assertTrue($firstOrderStatus->equals($secondOrderStatus));
        self::assertFalse($firstOrderStatus->equals($thirdOrderStatus));
    }

    public function test_can_convert_to_string(): void
    {
        $orderStatus = OrderStatus::create(StatusEnum::DELIVERED->value);
        self::assertEquals(StatusEnum::DELIVERED->value, (string) $orderStatus);
    }

    public function test_invalid_status_throws_exception(): void
    {
        self::expectException(\InvalidArgumentException::class);
        OrderStatus::create('InvalidStatus');
    }
}
