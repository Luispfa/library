<?php

declare(strict_types=1);

namespace orders\list\domain;

use orders\list\domain\exception\OrderEmailInvalidException;

readonly final class OrderEmail
{
    public function __construct(public string $value)
    {
        $this->validate($value);
    }

    private function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new OrderEmailInvalidException();
        }
    }
}
