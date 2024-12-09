<?php
namespace LeetcodeSolutions;

interface ISolution
{
    public static function getProblem(): string;
    public static function getName(): string;
    public function run(): mixed;
    public function setInput(array $input): void;
}
