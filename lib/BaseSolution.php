<?php

namespace LeetcodeSolutions;

abstract class BaseSolution implements ISolution
{
    protected function readInput($prompt): string
    {
        echo $prompt;
        return trim(fgets(STDIN));
    }
}
