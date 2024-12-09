#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use LeetcodeSolutions\BaseSolution;

function listSolutions(): void
{
    $solutions = getAvailableSolutions();

    echo "Доступные решения:\n";
    foreach ($solutions as $solution) {
        echo "  - {$solution::getName()} ({$solution})\n";
    }
}

function runSolution($solutionName): void
{
    $solutions = getAvailableSolutions();

    if (isset($solutions[$solutionName])) {
        $solutionClass = $solutions[$solutionName];
        $solution = new $solutionClass();
        $result = $solution->run();
        echo "Результат: " . json_encode($result) . "\n";
    } else {
        echo "Решение '$solutionName' не найдено.\n";
    }
}

function getSolutionProblem($solutionName): void
{
    $solutions = getAvailableSolutions();

    if (isset($solutions[$solutionName])) {
        echo $solutions[$solutionName]::getProblem() . "\n";
    } else {
        echo "Решение '$solutionName' не найдено.\n";
    }
}

function runTests($solutionName): void
{
    $solutions = getAvailableSolutions();

    if (isset($solutions[$solutionName])) {
        $solutionClass = $solutions[$solutionName];

        $testFile = __DIR__ . '/../tests/' . basename(str_replace('\\', '/', $solutionClass)) . 'Test.php';

        if (file_exists($testFile)) {
            echo "Запуск тестов для решения $solutionName...\n";
            exec("./vendor/bin/phpunit $testFile", $output, $returnCode);
            echo implode("\n", $output) . "\n";
            if ($returnCode !== 0) {
                echo "Тесты провалены для $solutionName\n";
                return;
            }
            echo "Тесты пройдены для $solutionName!\n";
        } else {
            echo "Тестовый файл для '$solutionName' не найден.\n";
        }
    } else {
        echo "Решение '$solutionName' не найдено.\n";
    }
}

function getAvailableSolutions(): array
{
    $solutions = [];
    $solutionFiles = glob(__DIR__ . '/../lib/*.php');

    foreach ($solutionFiles as $file) {
        $className = 'LeetcodeSolutions\\' . basename($file, '.php');
        if (class_exists($className) && is_subclass_of($className, BaseSolution::class)) {
            $solutions[$className::getName()] = $className;
        }
    }

    return $solutions;
}

function main(): void
{

    echo "Добро пожаловать в инструмент Solutions CLI\n";

    while (true) {
        $command = readInput("Введите команду (list, problem <solution>, run <solution>, test <solution>, exit): ");
        $args = explode(' ', $command);

        switch ($args[0]) {
            case 'list':
                listSolutions();
                break;
            case 'run':
                if (isset($args[1])) {
                    runSolution($args[1]);
                } else {
                    echo "Пожалуйста укажите решение.\n";
                }
                break;
            case 'test':
                if (isset($args[1])) {
                    runTests($args[1]);
                } else {
                    echo "Пожалуйста укажите решение для тестирования.\n";
                }
                break;
            case 'problem':
                if (isset($args[1])) {
                    getSolutionProblem($args[1]);
                } else {
                    echo "Пожалуйста укажите решение.\n";
                }
                break;
            case 'exit':
                echo "Выход...\n";
                exit(0);
            default:
                echo "Неизвестная команда. Доступные команды: list, problem <solution>, run <solution>, test <solution>, exit.\n";
                break;
        }
    }
}

function readInput($prompt): string
{
    echo $prompt;
    return trim(fgets(STDIN));
}

main();
