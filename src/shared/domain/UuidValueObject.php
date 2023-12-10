<?php

declare(strict_types=1);

namespace shared\domain;

use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class UuidValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidUuid();
    }

    public static function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function ensureIsValidUuid(): void
    {
        if (!RamseyUuid::isValid($this->value())) {
            throw new \InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $this->value)
            );
        }
    }
}
