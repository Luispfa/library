<?php

declare(strict_types=1);

namespace orders\shared\domain\exception;

use InvalidArgumentException;

class OrderNameLengthException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('Order name cannot be longer than 50 characters.');
    }
}
