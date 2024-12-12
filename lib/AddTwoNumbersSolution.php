<?php

namespace LeetcodeSolutions;

class AddTwoNumbersSolution  extends BaseSolution
{
    private ListNode $l1;
    private ListNode $l2;

    public function __construct(bool $CLIMode = true)
    {
        if ($CLIMode) {
            $this->l1 = ListNode::arrayToList(array_map('intval', explode(',', $this->readInput('Введите первый массив целых чисел (через запятую): '))));
            $this->l2 = ListNode::arrayToList(array_map('intval', explode(',', $this->readInput('Введите второй массив целых чисел (через запятую): '))));
        }
    }

    public function setInput(array $input): void
    {
        [$this->l1, $this->l2] = $input;
    }

    public static function getProblem(): string
    {
        return 'You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.';
    }

    public static function getName(): string
    {
        return 'add-two-numbers';
    }

    public function run(): ListNode
    {
        return $this->addTwoNumbers($this->l1,$this->l2);
    }

    function addTwoNumbers($l1, $l2)
    {
        if ($l1 === null && $l2 === null) {
            return null;
        } elseif ($l1 === null && $l2 !== null) {
            return $l2;
        } elseif ($l1 !== null && $l2 === null) {
            return $l1;
        }

        $sum = $l1->val + $l2->val;

        $next = $this->addTwoNumbers($l1->next, $l2->next);

        if ($sum >= 10) {
            $sum %= 10;
            $next = $this->addTwoNumbers($next, new ListNode(1));
        }

        return new ListNode($sum, $next);
    }
}
