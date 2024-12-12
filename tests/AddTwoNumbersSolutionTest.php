<?php

namespace Tests;

use LeetcodeSolutions\ListNode;
use PHPUnit\Framework\TestCase;
use LeetcodeSolutions\AddTwoNumbersSolution;

class AddTwoNumbersSolutionTest extends TestCase
{
    /**
     * @dataProvider addTwoNumberDataProvider
     */
    public function testTwoSum($l1, $l2, $expectedOutput)
    {
        $solution = new AddTwoNumbersSolution(false);
        $solution->setInput([$l1, $l2]);

        $result = $solution->run();

        $this->assertEquals($expectedOutput, ListNode::listToArray($result));
    }

    public function addTwoNumberDataProvider(): array
    {
        return [
            [
                new ListNode(2, new ListNode(4, new ListNode(3))),
                new ListNode(5, new ListNode(6, new ListNode(4))),
                [7, 0, 8]  // expectedOutput
            ],
            [
                new ListNode(0),
                new ListNode(0),
                [0]  // expectedOutput
            ],
            [
                new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))))))),
                new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9)))),
                [8,9,9,9,0,0,0,1] // expectedOutput
            ]
        ];
    }
}
