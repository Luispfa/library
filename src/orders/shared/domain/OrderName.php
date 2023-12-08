<?php

declare(strict_types=1);

namespace orders\shared\domain;

use orders\shared\domain\exception\OrderNameLengthException;
use shared\domain\StringValueObject;

final class OrderName extends StringValueObject
{
    public function __construct(protected string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidateLength();
    }

    private function ensureIsValidateLength(): void
    {
        if (strlen($this->value()) > 50) {
            throw new OrderNameLengthException();
        }
    }
}
