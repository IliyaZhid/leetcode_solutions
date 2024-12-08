<?php
namespace LeetcodeSolutions;

interface ISolution
{
    public function getDescription(): string;
    public static function getName(): string;
    public function run(): mixed;
    public function setInput(array $input): void;
}
