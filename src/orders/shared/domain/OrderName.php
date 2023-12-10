<?php

declare(strict_types=1);

namespace orders\shared\domain;

use Exception;
use orders\shared\domain\exception\OrderNameLengthException;

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
