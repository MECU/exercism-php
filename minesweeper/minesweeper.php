<?php
declare(strict_types=1);

function solve(string $input): string
{
    $array = explode("\n", $input);
    $length = count($array);

    validTopBottomRow($array[1]);
    validTopBottomRow($array[$length - 2]);

    for ($i = 2; $i < $length - 2; ++$i) {
        validBoardRow($array[$i]);
    }

    $rowLen = strlen($array[1]);
    for ($i = 2; $i < $length - 2; ++$i) {
        for ($j = 1; $j < $rowLen -1; ++$j) {
            if ($array[$i][$j] === '*') {
                for ($ii = -1; $ii < 2; ++$ii) {
                    for ($jj = -1; $jj < 2; ++$jj) {
                        if (!in_array($array[$i+$ii][$j+$jj], ['-', '+', '|', '*'])) {
                            $array[$i+$ii][$j+$jj] = $array[$i+$ii][$j+$jj] === ' ' ? 1 : (int)$array[$i+$ii][$j+$jj]+1;
                        }
                    }
                }
            }
        }
    }

    return implode("\n", $array);
}

function validTopBottomRow(string $row): void
{
    // first and last string must be +
    // All others must be -
    $length = strlen($row);
    if ($row[0] !== '+' || $row[$length - 1] !== '+') {
        throw new InvalidArgumentException;
    }

    for ($i = 1; $i < $length - 1; ++$i) {
        if ($row[$i] !== '-') {
            throw new InvalidArgumentException;
        }
    }
}

function validBoardRow(string $row): void
{
    // Length must be > 3
    $length = strlen($row);
    if ($length < 4) {
        throw new InvalidArgumentException;
    }

    // first and last string must be |
    // All others must be * or space
    if ($row[0] !== '|' || $row[$length - 1] !== '|') {
        throw new InvalidArgumentException;
    }

    for ($i = 1; $i < $length - 1; ++$i) {
        if ($row[$i] !== ' ' && $row[$i] !== '*') {
            throw new InvalidArgumentException;
        }
    }
}
