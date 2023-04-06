<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Prime;

require_once './src/Core.php';

use function BrainGames\Core\core;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function generateData($length = 10)
{
    $data = [];
    $count = 0;

    while ($count < $length) {
        $num = rand(1, 15);
        if (gmp_prob_prime($num) === 2) {
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
