<?php

function numbers(): array
{
    return [
        0 => [
            " _ ",
            "| |",
            "|_|",
        ],
        1 => [
            "   ",
            "  |",
            "  |",
        ],
        2 => [
            " _ ",
            " _|",
            "|_ ",
        ],
        3 => [
            " _ ",
            " _|",
            " _|",
        ],
        4 => [
            "   ",
            "|_|",
            "  |",
        ],
        5 => [
            " _ ",
            "|_ ",
            " _|",
        ],
        6 => [
            " _ ",
            "|_ ",
            "|_|",
        ],
        7 => [
            " _ ",
            "  |",
            "  |",
        ],
        8 => [
            " _ ",
            "|_|",
            "|_|",
        ],
        9 => [
            " _ ",
            "|_|",
            " _|",
        ],
    ];
}

function recognize(array $array): string
{
    if (count($array) % 4 !== 0) {
        throw new InvalidArgumentException('There must be 4 rows for each line');
    }

    foreach ($array as $line) {
        if (strlen($line) % 3 !== 0) {
            throw new InvalidArgumentException('There must be 3 columns for each char');
        }
    }

    $return = '';
    $rows = count($array) / 4;
    // Grab the first 3 columns for the first 4 rows
    for ($row = 0; $row < $rows; ++$row) {
        if ($return !== '') {
            $return .= ',';
        }

        $row1 = $array[$row*4];
        $row2 = $array[$row*4 + 1];
        $row3 = $array[$row*4 + 2];

        while ($row1 !== '') {
            $char = [
                substr($row1, 0, 3),
                substr($row2, 0, 3),
                substr($row3, 0, 3),
            ];

            $found = false;
            foreach (numbers() as $key => $encoded) {
                if ($encoded === $char) {
                    $return .= $key;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $return .= '?';
            }

            $row1 = substr($row1, 3);
            $row2 = substr($row2, 3);
            $row3 = substr($row3, 3);
        }
    }

    return $return;
}
