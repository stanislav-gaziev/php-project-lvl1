<?php

namespace Php\Project\Lvl1\Games\brain\progression;

function getDataGameBrainProgression(): array
{
    $gameDescription = 'What number is missing in the progression?';
    $data = [$gameDescription];

    $counter = 0;
    $rounds = 3;

    $minNumber = 1;
    $maxNumber = 100;
    $progressionMinLength = 5;
    $progressionMaxLength = 10;
    $progressionMinStep = 2;
    $progressionMaxStep = 5;

    while ($counter < $rounds) {
        $progressionLength = rand($progressionMinLength, $progressionMaxLength);
        $missedNumberPosition = rand(0, $progressionLength - 1);
        $progressionStep = rand($progressionMinStep, $progressionMaxStep);
        $numbers = [];
        $expectedResult = 0;
        $currentPosition = 0;

        while ($currentPosition < $progressionLength) {
            if ($currentPosition === 0) {
                $currentNumber = rand($minNumber, $maxNumber);
            } elseif ($numbers[$currentPosition - 1] === "..") {
                $currentNumber = $expectedResult + $progressionStep;
            } else {
                $currentNumber = $numbers[$currentPosition - 1] + $progressionStep;
            }

            if ($currentPosition === $missedNumberPosition) {
                $expectedResult = $currentNumber;
                $numbers[] = "..";
                $currentPosition++;
                continue;
            }

            $numbers[] = $currentNumber;
            $currentPosition++;
        }

        $questionValue = implode(' ', $numbers);

        $data = [...$data, [$questionValue, $expectedResult]];
        $counter++;
    }

    return $data;
}
