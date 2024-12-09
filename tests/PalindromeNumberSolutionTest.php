<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use LeetcodeSolutions\PalindromeNumberSolution;

class PalindromeNumberSolutionTest extends TestCase
{
    /**
     * @dataProvider twoSumDataProvider
     */
    public function testTwoSum($x, $expectedOutput)
    {
        $solution = new PalindromeNumberSolution(false);
        $solution->setInput([$x]);

        $result = $solution->run();

        $this->assertEquals($expectedOutput, $result);
    }

    public function twoSumDataProvider(): array
    {
        return [
            [
                121,    // x
                true    // expectedOutput
            ],
            [
                -121,   // x
                false   // expectedOutput
            ],
            [
                10,     // x
                false   // expectedOutput
            ],
            // Добавьте другие тестовые случаи здесь
        ];
    }
}
