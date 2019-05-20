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
    $length = strlen($input);
    if ($length < 2) {
        return false;
    }

    // Every 2nd char through the string from the right
    for ($i = $length - 2; $i > -1; $i -= 2) {
        // Double values, subtract 9 if doubled value > 9
        $value = $input[$i] * 2;
        if ($value > 9) {
            $value -= 9;
        }
        $input[$i] = $value;
    }

    // If the sum of all values is evenly divisible by 10: valid
    return array_sum(str_split($input)) % 10 === 0;
}
