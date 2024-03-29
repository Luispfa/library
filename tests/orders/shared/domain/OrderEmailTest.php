<?php

declare(strict_types=1);

namespace App\Tests\orders\shared\domain;

use orders\shared\domain\OrderEmail;
use PHPUnit\Framework\TestCase;
use shared\domain\exception\EmailInvalidException;

final class OrderEmailTest extends TestCase
{
    public function test_order_name_with_valid_length(): void
    {
        $orderEmail = new OrderEmail('email@email.com');
        self::assertInstanceOf(OrderEmail::class, $orderEmail);
    }

    public function test_order_name_with_invalid_length(): void
    {
        self::expectException(EmailInvalidException::class);
        self::expectExceptionMessage('The email address is not valid.');

        new OrderEmail('ThisIsNotEmail');
    }
}
