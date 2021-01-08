<?php

namespace Php\Project\Lvl1\brain\even;

use function cli\line;
use function cli\prompt;

function toPlayBrainEven($name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $minNumber = 1;
    $maxNumber = 100;
    $rounds = 3;
    $counter = 0;

    while ($counter < $rounds) {
        $currentNumber = rand($minNumber, $maxNumber);
        $expectedResult = $currentNumber % 2 === 0 ? 'yes' : 'no';
        line("Question: %d", $currentNumber);
        $result = prompt("Your answer");

        if ($result !== $expectedResult) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $result, $expectedResult);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
        $counter++;
    }

    line("Congratulations, %s!", $name);
}
