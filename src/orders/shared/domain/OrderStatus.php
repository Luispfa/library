<?php

declare(strict_types=1);

namespace orders\shared\domain;

use shared\domain\StringValueObject;

final class OrderStatus extends StringValueObject
{
    protected function __construct(protected string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidStatus();
    }

    public static function create(string $value): self
    {
        return new static($value);
    }

    public static function initialize(): self
    {
        return new static(StatusEnum::PENDING->value);
    }

    private function ensureIsValidStatus(): void
    {
        if (!StatusEnum::isValid($this->value())) {
            throw new \InvalidArgumentException(sprintf('%s is invalid', $this->value()));
        }
    }
}
