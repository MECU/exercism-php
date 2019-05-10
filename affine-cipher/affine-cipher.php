<?php
declare(strict_types=1);

function encode(string $rawInput, int $a, int $b): string
{
    if (!isCoPrime($a)) {
        throw new Exception;
    }

    // Remove everything not a letter or numbers
    $input = preg_replace('/\W/', '', $rawInput);
    $array = array_map('\strtolower', str_split($input));
    foreach ($array as &$value) {
        // Numbers stay numbers
        if (!is_numeric($value)) {
            $value = index2Letter(($a * letter2Index($value) + $b) % 26);
        }
    }

    return wordwrap(implode('', $array), 5, ' ', true);
}

function decode(string $rawInput, int $a, int $b): string
{
    if (!isCoPrime($a)) {
        throw new Exception('Error: a and m must be coprime.');
    }

    // Remove everything not a letter or number
    $input = preg_replace('/\W/', '', $rawInput);
    $array = array_map('\strtolower', str_split($input));
    $mmi = mmi($a);
    foreach ($array as &$value) {
        $x = letter2Index($value) - $b;
        while ($x < 0)
        {
            $x += 26;
        }

        // Numbers stay numbers
        if (!is_numeric($value)) {
            $value = index2Letter(($mmi * $x) % 26);
        }
    }

    return implode('', $array);
}

function isCoPrime(int $a, int $b = 26): bool
{
    return gcd($a, $b) === 1;
}

// Euclidean algorithm
function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $t = $b;
        $b = $a % $b;
        $a = $t;
    }

    return $a;
}

// Only works for lower case letters
function letter2Index(string $letter): int
{
    // Could add a check if the letter is uppercase
    return ord($letter) - ord('a');
}

// Only works for lower case letters
function index2Letter(int $index): string
{
    return chr(ord('a') + $index);
}

function mmi(int $a, int $m = 26): int
{
    $a %= $m;
    for ($x = 1; $x < $m; ++$x) {
        if (($a * $x) % $m === 1) {
            return $x;
        }
    }
}
