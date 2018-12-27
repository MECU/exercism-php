<?php

function toRna(string $dna): string
{
    return strtr($dna, [
        'G' => 'C',
        'C' => 'G',
        'A' => 'U',
        'T' => 'A',
    ]);
}
