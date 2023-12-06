<?php

declare(strict_types=1);

namespace orders\list\domain\exception;

use InvalidArgumentException;

class OrderEmailInvalidException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('The email address is not valid.');
    }
}
