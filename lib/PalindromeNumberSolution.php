<?php
namespace LeetcodeSolutions;

class PalindromeNumberSolution extends BaseSolution
{
    protected int $x;

    public function __construct(bool $CLIMode = true)
    {
        if ($CLIMode) {
            $this->x = (int)$this->readInput('Введите число для проверки: ');
        }
    }

    public function setInput(array $input): void
    {
        [$this->x] = $input;
    }

    public static function getProblem(): string
    {
        return 'Given an integer x, return true if x is a palindrome, and false otherwise.';
    }

    public static function getName(): string
    {
        return 'palindrome-number';
    }

    public function run(): bool
    {
        return $this->x == strrev($this->x);
    }
}
