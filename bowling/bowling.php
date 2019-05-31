<?php

class Game
{
    private $bowling = [];

    public function roll(int $pins): void
    {
        if ($pins > 10 || $pins < 0) {
            throw new \Exception;
        }

        $this->bowling[] = $pins;
    }

    public function score(): int
    {
        if (!in_array(count($this->bowling), [20, 21, 22])) {
            throw new Exception;
        }

        $score = 0;

        foreach ($this->bowling as $ball => $pins) {
            if ($ball > 0) {
                if ($this->bowling[$ball - 1] + $pins === 10) {
                    $score += $this->bowling[$ball + 1];
                } elseif ($pins === 10) {
                    $score += $this->bowling[$ball + 1] + $this->bowling[$ball + 2];
                }
            }

            $score += $pins;
        }

        return $score;
    }
}
