<?php

function distance(string $a, string $b): int
{
    if (strlen($a) !== strlen($b)) {
        throw new \InvalidArgumentException('DNA strands must be of equal length.');
    }

    return count(array_diff_assoc(str_split($a), str_split($b)));
}

function distance_second(string $a, string $b): int
{
    if (strlen($a) !== strlen($b)) {
        throw new \InvalidArgumentException('DNA strands must be of equal length.');
    }

    $distance = 0;
    $length = strlen($a);
    for ($i = 0; $i < $length; ++$i) {
        if ($a[$i] !== $b[$i]) {
            ++$distance;
        }
    }

    return $distance;
}

function distance_first($a, $b): int
{
    if (strlen($a) !== strlen($b)) {
        throw new \InvalidArgumentException('DNA strands must be of equal length.');
    }

    $distance = 0;
    while ($a !== '') {
        if (substr($a, 0, 1) !== substr($b, 0, 1)) {
            ++$distance;
        }

        $a = substr($a, 1);
        $b = substr($b, 1);
    }

    return $distance;
}

