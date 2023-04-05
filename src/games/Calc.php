<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Calc;

require_once './src/Core.php';

use function BrainGames\Core\core;

const RULES = 'What is the result of the expression?';

function generateData($length = 10)
{
    $data = [];
    $operations = ['+', '-', '*'];
    $count = 0;

    while ($count < $length) {
        $num = rand(1, 10);
        $num2 = rand(1, 10);
        $operation = $operations[rand(0, 2)];
        $result = 0;

        switch ($operation) {
            case '+':
                $result = $num + $num2;
                break;
            case '-':
                $result = $num - $num2;
                break;
            case '*':
                $result = $num * $num2;
        }

        $str = "{$num} {$operation} {$num2}";
        $data[] = [$str, (string) $result];
        $count++;
    }

    return $data;
}

function play()
{
    core(RULES, generateData());
}
