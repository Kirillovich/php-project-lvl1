<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Core;

use function cli\line;
use function cli\prompt;

function core(string $rules, array $data)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($rules);

    $lengthEnd = count($data) - 1;
    $rounds = 3;

    while ($rounds > 0) {
        $position = rand(0, $lengthEnd);
        [$question, $verity] = $data[$position];
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer === (string) $verity) {
            line('Correct!');
            if ($rounds === 1) {
                line("Congratulations, {$name}!");
            }
            $rounds--;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$verity}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
}
