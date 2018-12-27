<?php

function isIsogram(string $input): bool
{
    $inputCleanup = strtolower(preg_replace('/[[:punct:]]\s/', '', $input));
    $letters = preg_split('//u', $inputCleanup, null, PREG_SPLIT_NO_EMPTY);
    $unique = array_unique($letters);

    return count($unique) === count($letters);
}
