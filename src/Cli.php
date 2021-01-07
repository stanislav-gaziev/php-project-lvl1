<?php

namespace Php\Project\Lvl1\Cli;

use function cli\line;
use function cli\prompt;

function showGreeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
