<?php

function isPangram(string $input): bool
{
    return strpos(count_chars(strtolower($input), 3), 'abcdefghijklmnopqrstuvwxyz') !== false;
}
