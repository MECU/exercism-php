<?php

function sieve(int $val): array
{
    if ($val < 2) {
        return [];
    }

    $array = range(2, $val);

    foreach ($array as $value) {
        $array = filterArray($array, $value);
    }

    sort($array);

    return $array;
}

function filterArray(array $array, int $prime): array
{
    foreach ($array as $key => $value) {
        if ($value % $prime === 0 && $value !== $prime) {
            unset($array[$key]);
        }
    }

    return $array;
}
