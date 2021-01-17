<?php

namespace Php\Project\Lvl1\Cli;

use function cli\line;
use function cli\prompt;
use function Php\Project\Lvl1\Engine\toPlayGame;

function getPlayerName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function chooseGame($gameName = '')
{
    $playerName = getPlayerName();

    if ($gameName === '') {
        line('Games:');

        $dir = __DIR__ . '/Games';
        $files = array_diff(scandir($dir), array('..', '.'));
        $games = [];

        foreach ($files as $file) {
            [$fileName] = explode('.', $file);
            $games[] = $fileName;
            line('%s', $fileName);
        }

        $gameName = prompt('Write name a game (example: brain-name)');
    } else {
        $games = [$gameName];
    }

    if (in_array($gameName, $games, true)) {
        toPlayGame($playerName, $gameName);
    } else {
        line('Incorrect name a game!');
    }
}
