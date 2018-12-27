<?php
declare(strict_types=1);

function diamond(string $letter): array
{
    // Outside spaces are the number of letters after A
    $outside = ord($letter) - 65;
    $size = ($outside * 2 + 1) / 2;

    for ($i = 0; $i < $size; ++$i) {
        $array[$i] = str_repeat(' ', $outside - $i) . chr($i + 65) . str_repeat(' ', $i);
    }

    // Duplicate the second/right half, same as the first, except the "middle" row
    $length = strlen($array[0]) - 1;
    foreach ($array as $key => $value) {
        $array[$key] .= strrev(substr($value, 0, $length));
    }

    // Duplicate the bottom half as the top
    $size = count($array);
    for ($i = 0; $i < $outside; ++$i) {
        $array[$i + $size] = $array[$size - $i - 2];
    }

    return $array;
}
