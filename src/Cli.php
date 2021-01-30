<?php

namespace Php\Project\Lvl1\Cli;

use function cli\line;
use function cli\prompt;
use function Php\Project\Lvl1\Engine\toPlayGame;

function getPlayerName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function chooseGame(string $gameName): void
{
    $playerName = getPlayerName();

    toPlayGame($playerName, $gameName);
}
