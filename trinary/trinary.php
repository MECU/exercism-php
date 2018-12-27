<?php

function toDecimal(string $input): int
{
    $inputArray = array_reverse(str_split($input));
    if (max($inputArray) > 2) {
        return 0;
    }

    $value = 0;
    foreach ($inputArray as $place => $quantity) {
        $value += $quantity * 3 ** $place;
    }

    return $value;
}
