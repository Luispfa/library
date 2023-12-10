<?php

declare(strict_types=1);

namespace orders\shared\domain;

use orders\shared\domain\exception\OrderEmailInvalidException;

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
