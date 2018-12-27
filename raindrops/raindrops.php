<?php
declare(strict_types=1);

function raindrops(int $input): string
{
    $output = '';
    if ($input % 3 === 0) {
        $output .= 'Pling';
    }
    if ($input % 5 === 0) {
        $output .= 'Plang';
    }
    if ($input % 7 === 0) {
        $output .= 'Plong';
    }

    return $output === '' ? (string)$input : $output;
}
