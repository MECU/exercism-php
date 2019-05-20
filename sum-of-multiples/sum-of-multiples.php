<?php
declare(strict_types=1);

function sumOfMultiples(int $value, array $multiples): int
{
    $sum = 0;
    for ($i = 1; $i < $value; ++$i) {
        foreach ($multiples as $key => $multiple) {
            if ($multiple === 0) {
                // Remove zero from multiples
                unset($multiples[$key]);
                continue;
            }
            if ($i % $multiple === 0) {
                $sum += $i;
                continue 2;
            }
        }
    }

    return $sum;
}
