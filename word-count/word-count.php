<?php
declare(strict_types=1);

function wordCount(string $input)
{
    return array_count_values(preg_split('/\s/', strtolower(preg_replace('/[[:punct:]]/', '', $input)), -1, PREG_SPLIT_NO_EMPTY));
}
