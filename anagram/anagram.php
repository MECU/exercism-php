<?php

function detectAnagrams(string $anagram, array $possibles): array
{
    $match = [];
    $length = strlen($anagram);
    $anagramLower = mb_strtolower($anagram);
    $anagramChars = array_count_values(unpack('C*', $anagramLower));

    foreach ($possibles as $possible) {
        if (strlen($possible) !== $length) {
            continue;
        }

        $possibleLower = mb_strtolower($possible);
        if ($possibleLower === $anagramLower) {
            continue;
        }

        $possibleChars = array_count_values(unpack('C*', $possibleLower));

        if (array_diff_assoc($possibleChars, $anagramChars) === []) {
            $match[] = $possible;
        }
    }

    return array_values($match);
}
