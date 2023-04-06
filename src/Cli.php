<?php

// phpcs:disable PSR1.Files.SideEffects
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, {$name}!");
}
