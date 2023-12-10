<?php

declare(strict_types=1);

namespace orders\shared\domain;

use shared\domain\FloatValueObject;

final class OrderTotalPrice extends FloatValueObject
{
    const DECIMAL_COUNT = 2;

    public function __construct(protected float $value)
    {
        parent::__construct($value);
        $this->validatePositiveValue();
    }

    public static function initialize(): self
    {
        return new static(0);
    }

    public function __toString(): string
    {
        return number_format($this->value(), static::DECIMAL_COUNT, '.', '');
    }

    private function validatePositiveValue(): void
    {
        if ($this->value() < 0) {
            throw new \InvalidArgumentException('Amount needs to be positive');
        }
    }
}
