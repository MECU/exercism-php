<?php

class BeerSong
{
    public function verse(int $count): string
    {
        $number = 'No more bottles';
        $storeOrMore = 'Go to the store and buy some more';
        $next = '99 bottles';
        $eol = '';

        if ($count > 1) {
            $number = "$count bottles";
            $storeOrMore = 'Take one down and pass it around';
            $next = ($count - 1 > 1) ? $count - 1 . ' bottles' : '1 bottle';
            $eol = "\n";
        } elseif ($count === 1) {
            $number = '1 bottle';
            $storeOrMore = 'Take it down and pass it around';
            $next = 'No more bottles';
            $eol = "\n";
        }

        return "$number of beer on the wall, " . strtolower($number) . " of beer.\n" .
            "$storeOrMore, " . strtolower($next) . " of beer on the wall.$eol";
    }

    public function verses(int $start, int $end): string
    {
        $song = '';
        do {
            $song .= $this->verse($start);
            --$start;
            $song .= "\n";
        } while ($start >= $end);

        return substr($song, 0, -1);
    }

    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
}
