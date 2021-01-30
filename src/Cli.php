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

function chooseGame(string $gameName = ''): void
{
    $playerName = getPlayerName();

    if ($gameName === '') {
        line('Games:');

        $dir = __DIR__ . '/Games';
        $files = array_diff(scandir($dir), array('..', '.'));
        $games = [];
        $num = 1;

        foreach ($files as $file) {
            [$fileName] = explode('.', $file);
            $games[$num] = $fileName;
            line('%s. %s', $num, $fileName);
            $num += 1;
        }

        $gameNumber = prompt('Write number a game (example: 1)');
        $gameName = ($games[$gameNumber] ?? '');
    } else {
        $games = [$gameName];
    }

    if (in_array($gameName, $games, true)) {
        toPlayGame($playerName, $gameName);
    } else {
        line('Incorrect number a game!');
    }
}
