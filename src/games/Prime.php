<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Prime;

require_once __DIR__ . '/../../src/Core.php';

use function BrainGames\Core\core;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';


function primeCheck($number)
{
    if ($number == 1) {
        return 0;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return 0;
        }
    }

    return 1;
}

function generateData(int $length = 10)
{
    $data = [];
    $count = 0;

    while ($count < $length) {
        $num = rand(1, 15);
        if (primeCheck($num) === 1) {
            $data[] = [$num, 'yes'];
        } else {
            $data[] = [$num, 'no'];
        }
        $count++;
    }

    return $data;
}

function play()
{
    core(RULES, generateData());
}
