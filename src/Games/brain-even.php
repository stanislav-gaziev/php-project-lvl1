<?php

namespace Php\Project\Lvl1\Games\brain\even;

function getDataGameBrainEven(): array
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $data = [$gameDescription];

    $counter = 0;
    $rounds = 3;

    $minNumber = 1;
    $maxNumber = 100;

    while ($counter < $rounds) {
        $questionValue = rand($minNumber, $maxNumber);
        $expectedResult = $questionValue % 2 === 0 ? 'yes' : 'no';

        $data = [...$data, [$questionValue, $expectedResult]];
        $counter++;
    }

    return $data;
}
