<?php

function meetup_day(int $year, int $month, string $day, string $weekday): DateTime
{
    $monthString = date('F', mktime(0, 0, 0, $month, 1, $year));
    if (strpos($day, 'teenth') === false) {
        return new DateTime("$day $weekday of $monthString $year");
    }

    $dateTime = new DateTime("13 $monthString $year");
    if ($dateTime->format('l') === $weekday) {
        return $dateTime;
    }

    $dateTime->modify("next $weekday");

    return $dateTime;
}
