<?php
declare(strict_types=1);

function calculate(string $input): int
{
    // Strip "What is " and "?"
    $process = str_replace(['What is ', '?'], '', $input);

    $array = explode(' ', $process);
    // Get value
    $first = (int) array_shift($array);

    while (count($array) > 0) {
        // Get operator
        $op = array_shift($array);
        // If Multiply or Divide, extra pop the by
        if ($op === 'multiplied' || $op === 'divided') {
            array_shift($array);
        }

        // Get value
        $second = (int) array_shift($array);

        switch ($op) {
            case 'plus':
                $first += $second;
                break;
            case 'minus':
                $first -= $second;
                break;
            case 'multiplied':
                $first *= $second;
                break;
            case 'divided':
                $first /= $second;
                break;
            default:
                throw new InvalidArgumentException;
        }
    }

    return $first;
}
