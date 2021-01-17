<?php

namespace Php\Project\Lvl1\Games\brain\calc;

function getDataGameBrainCalc(): array
{
    $gameDescription = 'What is the result of the expression?';
    $data = [$gameDescription];

    $counter = 0;
    $rounds = 3;

    $minNumber = 1;
    $maxNumber = 100;
    $operators = ['+', '-', '*'];

    while ($counter < $rounds) {
        $lenArr = count($operators);
        $operator = $operators[rand(0, $lenArr - 1)];
        $num1 = rand($minNumber, $maxNumber);
        $num2 = rand($minNumber, $maxNumber);
        $questionValue = '';
        $expectedResult = '';

        if ($operator == '+') {
            $questionValue = "{$num1} + {$num2}";
            $expectedResult = $num1 + $num2;
        } elseif ($operator == '-') {
            $questionValue = "{$num1} - {$num2}";
            $expectedResult = $num1 - $num2;
        } elseif ($operator == '*') {
            $questionValue = "{$num1} * {$num2}";
            $expectedResult = $num1 * $num2;
        }

        $data = [...$data, [$questionValue, $expectedResult]];
        $counter++;
    }

    return $data;
}
