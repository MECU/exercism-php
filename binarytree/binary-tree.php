<?php

function solution($arr)
{
    if (count($arr) < 2) {
        return '';
    }

    $left = 0;
    $right = 0;
    $i = -1;
    while (count($arr) > 0) {
        ++$i;
        if ($i === 0) {
            array_shift($arr);
            continue;
        }

        $numberOfElements = $elementCounter = 2 ** $i;
        while ($elementCounter > 0 && count($arr) > 0) {
            if ($arr[0] < 0) {
                array_shift($arr);
                --$elementCounter;
                continue;
            }

            if ($elementCounter > $numberOfElements / 2) {
                $left += array_shift($arr);
            } else {
                $right += array_shift($arr);
            }

            --$elementCounter;
        }
    }

    if ($left > $right) {
        return 'Left';
    }
    if ($right > $left) {
        return 'Right';
    }

    return '';
}
