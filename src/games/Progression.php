<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Games\Progression;

require_once __DIR__ . '/../../src/Core.php';

use function BrainGames\Core\core;

const RULES = 'What number is missing in the progression?';

function generateData(int $length = 10)
{
    $data = [];
    $count = 0;

    while ($count < $length) {
        $startNumber = rand(1, 20);
        $stepProgression = rand(1, 5);
        $lengthProgression = rand(5, 10);
        $progression = [$startNumber];

        for ($i = 0; $i < $lengthProgression; $i++) {
            $temp = $startNumber + $stepProgression;
            $progression[] = $temp;
            $startNumber = $temp;
        }

        $positionHideNumber = rand(0, count($progression) - 1);
        $hideNumber = $progression[$positionHideNumber];
        $progression[$positionHideNumber] = '..';

        $data[] = [implode(' ', $progression), $hideNumber];
        $count++;
    }

    return $data;
}

function play()
{
    core(RULES, generateData());
}
