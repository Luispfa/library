<?php

declare(strict_types=1);

namespace App\example\application;

final class NumberProcessor
{
    public function sumIntegerNumbers(int ...$numbers): int
    {
        return array_sum($numbers);
    }
}
