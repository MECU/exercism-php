<?php

/**
 * @param int $number
 * @return string
 */
function toRoman($number) {
    $formatter = new \NumberFormatter('@numbers=roman', NumberFormatter::DECIMAL);
    return $formatter->format($number);
}
