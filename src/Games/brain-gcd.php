<?php

namespace Php\Project\Lvl1\Games\brain\gcd;

function getDataGameBrainGcd(): array
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $data = [$gameDescription];

    $counter = 0;
    $rounds = 3;

    $minNumber = 1;
    $maxNumber = 100;

    while ($counter < $rounds) {
        $divisorCommon = 1;
        $divisorCurrent = 1;
        $num1 = rand($minNumber, $maxNumber);
        $num2 = rand($minNumber, $maxNumber);
        $minNumberRand = $num1 <= $num2 ? $num1 : $num2;

        while ($divisorCurrent <= $minNumberRand) {
            if ($num1 % $divisorCurrent === 0 && $num2 % $divisorCurrent === 0) {
                $divisorCommon = $divisorCurrent;
            }

            $divisorCurrent++;
        }

        $questionValue = "{$num1} {$num2}";
        $expectedResult = $divisorCommon;

        $data = [...$data, [$questionValue, $expectedResult]];
        $counter++;
    }

    return $data;
}
