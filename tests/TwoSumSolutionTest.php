<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use LeetcodeSolutions\TwoSumSolution;

class TwoSumSolutionTest extends TestCase
{
    /**
     * @dataProvider twoSumDataProvider
     */
    public function testTwoSum($nums, $target, $expectedOutput)
    {
        $solution = new TwoSumSolution(false);
        $solution->setInput([$nums, $target]);

        $result = $solution->run();

        $this->assertEquals($expectedOutput, $result);
    }

    public function twoSumDataProvider()
    {
        return [
            [
                [2, 7, 11, 15], // nums
                9,              // target
                [0, 1]          // expectedOutput
            ],
            [
                [3, 2, 4],      // nums
                6,              // target
                [1, 2]          // expectedOutput
            ],
            [
                [3, 3],         // nums
                6,              // target
                [0, 1]          // expectedOutput
            ],
            // Добавьте другие тестовые случаи здесь
        ];
    }
}
