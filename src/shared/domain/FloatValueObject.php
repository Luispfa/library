<?php

declare(strict_types=1);

namespace shared\domain;

abstract class FloatValueObject
{
    public function __construct(protected float $value)
    {
        $this->maximumValueNotExceeded();
    }

    public function value(): float
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }

    private function maximumValueNotExceeded(): void
    {
        if ($this->value() > PHP_FLOAT_MAX) {
            throw new \InvalidArgumentException('Number is too big');
        }
    }
}
