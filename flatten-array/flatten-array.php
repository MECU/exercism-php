<?php
declare(strict_types=1);

function flatten(array $input): array
{
    $output = [];
    foreach ($input as $value) {
        if ($value === null) {
            continue;
        }

        if (is_array($value)) {
            $output = array_merge($output, flatten($value));
        } else {
            $output[] = $value;
        }

    }

    return $output;
}
