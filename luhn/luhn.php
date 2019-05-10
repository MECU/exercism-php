<?php
declare(strict_types=1);

function isValid(string $rawInput): bool
{
    // Strip spaces
    $input = preg_replace('/\s/', '', $rawInput);

    // Check for non-digits
    if (preg_match('/\D/', $input) === 1) {
        return false;
    }

    // strings of length 0 or 1 are invalid
    if (strlen($input) < 2) {
        return false;
    }

    // Cycle through the string from the right
    $array = array_reverse(str_split($input));
    foreach ($array as $key => &$value) {
        // Double even values, subtract 9 if doubled value > 9
        if ($key % 2 !== 0) {
            $value *= 2;
            if ($value > 9) {
                $value -= 9;
            }
        }
    }

    // Sum all the values
    // If the sum of all values is evenly divisible by 10: valid
    return array_sum($array) % 10 === 0;
}
