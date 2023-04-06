<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Even;

require_once __DIR__ . '/../../src/Core.php';

use function BrainGames\Core\core;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateData($length = 10)
{
    $data = [];
    $count = 0;

    while ($count < $length) {
        $num = rand(1, 15);
        if ($num % 2 === 0) {
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
