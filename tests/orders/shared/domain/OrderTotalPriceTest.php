<?php

declare(strict_types=1);

namespace App\Tests\orders\shared\domain;

use orders\shared\domain\OrderTotalPrice;
use PHPUnit\Framework\TestCase;

final class OrderTotalPriceTest extends TestCase
{
    public function test_initialize(): void
    {
        $orderTotalPrice = OrderTotalPrice::initialize();

        self::assertSame(0.0, $orderTotalPrice->value());
    }

    public function test_construct_with_valid_value(): void
    {
        $value = 10.5;
        $orderTotalPrice = new OrderTotalPrice($value);

        self::assertSame($value, $orderTotalPrice->value());
    }

    public function test_construct_with_negative_value(): void
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Amount needs to be positive');

        new OrderTotalPrice(-5);
    }

    public function test_construct_with_exceeded_value(): void
    {
        // Replace PHP_FLOAT_MAX with a value larger than PHP_FLOAT_MAX
        $exceededValue = PHP_FLOAT_MAX * 2;

        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Number is too big');

        new OrderTotalPrice($exceededValue);
    }

    public function testToString(): void
    {
        $value = 15.75;
        $orderTotalPrice = new OrderTotalPrice($value);

        self::assertSame('15.75', $orderTotalPrice->__toString());
    }
}
