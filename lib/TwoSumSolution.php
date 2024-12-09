<?php
namespace LeetcodeSolutions;

class TwoSumSolution extends BaseSolution
{
    protected array $nums;
    protected int $target;

    public function __construct(bool $CLIMode = true)
    {
        if ($CLIMode) {
            $this->nums = array_map('intval', explode(',', $this->readInput('Введите массив целых чисел (через запятую): ')));
            $this->target = (int)$this->readInput('Введите сумму двух чисел из массива: ');
        }
    }

    public function setInput(array $input): void
    {
        [$this->nums, $this->target] = $input;
    }

    public static function getProblem(): string
    {
        return 'Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.';
    }

    public static function getName(): string
    {
        return 'two-sum';
    }

    public function run(): array
    {
        $map = [];

        foreach ($this->nums as $i => $value) {
            $diff = $this->target - $value;

            if (isset($map[$diff])) {
                return [$map[$diff], $i];
            }

            $map[$value] = $i;
        }
    }
}
