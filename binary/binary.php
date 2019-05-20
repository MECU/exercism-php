<?php
declare(strict_types=1);

function parse_binary(string $binary): int
{
    // See if contains anything not a 0 or 1
    if (preg_match('/[^01]/', $binary)) {
        throw new InvalidArgumentException;
    }

    $value = 0;
    $input = strrev($binary);
    $length = strlen($input);
    for ($i = 0; $i < $length; ++$i) {
        $value += 2 ** $i * $input[$i];
    }

    return $value;
}
