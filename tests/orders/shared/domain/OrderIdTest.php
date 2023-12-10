<?php

declare(strict_types=1);

namespace App\Tests\orders\shared\domain;

use orders\shared\domain\OrderId;
use PHPUnit\Framework\TestCase;
use shared\domain\UuidValueObject;

class OrderIdTest extends TestCase
{
    public function test_can_be_created_with_valid_uuid(): void
    {
        $validUuid = '550e8400-e29b-41d4-a716-446655440000';
        $uuidValueObject = new OrderId($validUuid);

        self::assertInstanceOf(UuidValueObject::class, $uuidValueObject);
        self::assertEquals($validUuid, $uuidValueObject->value());
    }

    public function test_cannot_be_created_with_invalid_uuid(): void
    {
        self::expectException(\InvalidArgumentException::class);

        $invalidUuid = 'invalid-uuid';
        new OrderId($invalidUuid);
    }

    public function test_can_be_generated_randomly(): void
    {
        $uuidValueObject = OrderId::random();
        self::assertInstanceOf(UuidValueObject::class, $uuidValueObject);
    }

    public function test_can_check_equality(): void
    {
        $uuid1 = '550e8400-e29b-41d4-a716-446655440000';
        $uuid2 = '550e8400-e29b-41d4-a716-446655440001';

        $uuidValueObject1 = new OrderId($uuid1);
        $uuidValueObject2 = new OrderId($uuid2);
        $uuidValueObject3 = new OrderId($uuid1);

        self::assertTrue($uuidValueObject1->equals($uuidValueObject3));
        self::assertFalse($uuidValueObject1->equals($uuidValueObject2));
    }
}
