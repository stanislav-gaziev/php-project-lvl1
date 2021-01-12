<?php

namespace Php\Project\Lvl1\Engine;

use Php\Project\Lvl1\Games\brain\even;
use Php\Project\Lvl1\Games\brain\calc;
use Php\Project\Lvl1\Games\brain\gcd;

use function cli\line;
use function cli\prompt;

function toPlayGames($playerName, $gameName)
{
    [$part1, $part2] = explode('-', $gameName);
    $gameNameForFunc = ucfirst($part1) . ucfirst($part2);
    $func = "Php\Project\Lvl1\Games" . "\\" . "{$part1}" . "\\" . "{$part2}" . "\\" . "getDataGame{$gameNameForFunc}";
    $data = $func();

    [$gameDescription] = $data;
    line('%s', $gameDescription);

    for ($i = 1, $len = count($data); $i < $len; $i++) {
        [$questionValue, $expectedResult] = $data[$i];
        $expectedResult = (string) $expectedResult;
        line("Question: %s", $questionValue);
        $result = prompt("Your answer");

        if ($result !== $expectedResult) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $result, $expectedResult);
            line("Let's try again, %s!", $playerName);
            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $playerName);
}
