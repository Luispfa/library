<?php

declare(strict_types=1);

namespace shared\domain;

use shared\domain\exception\EmailInvalidException;

class EmailValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidEmail();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString()
    {
        return $this->value();
    }

    private function ensureIsValidEmail(): void
    {
        if (!filter_var($this->value(), FILTER_VALIDATE_EMAIL)) {
            throw new EmailInvalidException();
        }
    }
}
