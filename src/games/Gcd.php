<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Gcd;

require_once './src/Core.php';

use function BrainGames\Core\core;

const RULES = 'Find the greatest common divisor of given numbers.';

function generateData($length = 10)
{
    $data = [];
    $count = 0;

    while ($count < $length) {
        $num = rand(1, 100);
        $num2 = rand(1, 100);
        $min = min($num, $num2);
        $result = 0;

        for ($i = $min; $i > 0; $i--) {
            if ($num % $i === 0 && $num2 % $i === 0) {
                $result = $i;
                break;
            }
        }

        $data[] = ["{$num} {$num2}", $result];
        $count++;
    }

    return $data;
}

function play()
{
    core(RULES, generateData());
}
