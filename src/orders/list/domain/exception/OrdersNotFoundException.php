<?php

declare(strict_types=1);

namespace App\orders\list\domain\exception;

use RuntimeException;

class OrdersNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Orders not found.');
    }
}
