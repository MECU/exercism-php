<?php

class Bob
{
    private const WHATEVER = 'Whatever.';
    private const WHOA_CHILL_OUT = 'Whoa, chill out!';
    private const SURE = 'Sure.';
    private const CALM_DOWN = 'Calm down, I know what I\'m doing!';
    private const FINE_BE_THAT_WAY = 'Fine. Be that way!';

    public function respondTo(string $input): string
    {
        if (preg_match('/\S+/u', $input) !== 1) {
            return self::FINE_BE_THAT_WAY;
        }

        $noLetters = preg_match('/[[:lower:]]|[[:upper:]]/u', $input) !== 1;
        $question = substr(trim($input), -1) === '?';
        $allCaps = preg_match('/[[:lower:]]+/u', $input) !== 1;

        if ($allCaps && !$noLetters) {
            if ($question) {
                return self::CALM_DOWN;
            }


            return self::WHOA_CHILL_OUT;
        }

        if ($question) {
            return self::SURE;
        }

        return self::WHATEVER;
    }
}
