<?php

declare(strict_types=1);

namespace orders\list\domain;

enum StatusEnum: string
{
    case PENDING = 'Pending';
    case CONFIRMED = 'Confirmed';
    case SHIPPED = 'Shipped';
    case DELIVERED = 'Delivered';
}
