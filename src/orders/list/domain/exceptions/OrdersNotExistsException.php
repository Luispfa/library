<?php

declare(strict_types=1);

namespace App\orders\list\domain\exceptions;

use Exception;
use RuntimeException;

final class OrdersNotExistsException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('don\'t exist orders');
    }
}
