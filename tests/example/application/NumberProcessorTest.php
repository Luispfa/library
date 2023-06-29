<?php

declare(strict_types=1);

namespace App\Tests\example\application;

use App\example\application\NumberProcessor;
use PHPUnit\Framework\TestCase;

class NumberProcessorTest extends TestCase
{
    /**
     * @dataProvider numbersProvider
     */
    public function test_should_return_sum(
        array $numbers,
        int $expectedSum
    ): void {
        $numberProcessor = new NumberProcessor();
        $result = $numberProcessor->sumIntegerNumbers(...$numbers);

        self::assertEquals($result, $expectedSum);
    }

    public static function numbersProvider(): array
    {
        return [
            [[1, 2, 3], 6],
            [[1, 2, 3, 4, 5], 15],
            [[1, 2, 3, -5], 1]
        ];
    }
}
