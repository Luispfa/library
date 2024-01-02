<?php

declare(strict_types=1);

namespace orders\shared\domain;

enum StatusEnum: string
{
    case PENDING = 'Pending';
    case CONFIRMED = 'Confirmed';
    case SHIPPED = 'Shipped';
    case DELIVERED = 'Delivered';

    public static function isValid(string $status): bool
    {
        return in_array($status, array_column(static::cases(), 'value'));
    }
}
