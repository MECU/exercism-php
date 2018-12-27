<?php

function slices(string $input, int $length): array
{
    if ($length === 0 || strlen($input) < $length) {
        throw new \Exception();
    }

    $result = [];
    $stringLength = strlen($input);
    for ($i = 0; $i + $length <= $stringLength; ++$i) {
        $result[] = substr($input, $i, $length);
    }

    return $result;
}
