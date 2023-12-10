<?php

declare(strict_types=1);

namespace App\Tests\orders\shared\domain;

use orders\shared\domain\exception\OrderNameLengthException;
use orders\shared\domain\OrderName;
use PHPUnit\Framework\TestCase;

final class OrderNameTest extends TestCase
{
    public function test_order_name_with_valid_length(): void
    {
        $orderName = new OrderName('ValidName');
        self::assertInstanceOf(OrderName::class, $orderName);
    }

    public function test_order_name_with_invalid_length(): void
    {
        self::expectException(OrderNameLengthException::class);
        self::expectExceptionMessage('Order name cannot be longer than 50 characters.');

        new OrderName('ThisNameIsTooLongAndExceedsFiftyCharactersLimit985475');
    }
}
