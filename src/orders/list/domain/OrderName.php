<?php

declare(strict_types=1);

namespace orders\list\domain;

use Exception;
use orders\list\domain\exception\OrderNameLengthException;

readonly final class OrderName
{
    public function __construct(public string $value)
    {
        $this->validateLength($value);
    }

    private function validateLength(string $value): void
    {
        if (strlen($value) > 50) {
            throw new OrderNameLengthException();
        }
    }
}
