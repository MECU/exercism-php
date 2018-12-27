<?php

function squareOfSum(int $input): int
{
    return array_sum(range(1, $input)) ** 2;
}

function sumOfSquares(int $input): int
{
    return array_sum(array_map('square', range(1, $input)));
}

function difference(int $input): int
{
    return squareOfSum($input) - sumOfSquares($input);
}

function square($n)
{
    return $n ** 2;
}
