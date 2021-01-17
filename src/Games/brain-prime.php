<?php

namespace Php\Project\Lvl1\Games\brain\prime;

function getDataGameBrainPrime(): array
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = [$gameDescription];

    $counter = 0;
    $rounds = 3;

    $minNumber = 1;
    $maxNumber = 100;

    while ($counter < $rounds) {
        $questionValue = rand($minNumber, $maxNumber);
        $halfNumber = floor($questionValue / 2);
        $expectedResult = $questionValue > 1 ? 'yes' : 'no';
        $divisorCurrent = 2;

        while ($divisorCurrent <= $halfNumber) {
            if ($questionValue % $divisorCurrent === 0) {
                $expectedResult = 'no';
                break;
            }
            $divisorCurrent++;
        }

        $data = [...$data, [$questionValue, $expectedResult]];
        $counter++;
    }

    return $data;
}
