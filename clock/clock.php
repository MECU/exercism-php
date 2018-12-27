<?php

class Clock
{
    private $hour;
    private $minutes;

    public function __construct(int $hour = 0, int $minutes = 0)
    {
        $this->hour = $hour;
        $this->minutes = $minutes;

        $this->fixMinutes();
        $this->fixHour();
    }

    public function add(int $minutes): self
    {
        $this->minutes += $minutes;

        $this->fixMinutes();
        $this->fixHour();


        return $this;
    }

    public function sub(int $minutes): self
    {
        $this->add(-$minutes);

        return $this;
    }

    public function __toString(): string
    {
        return sprintf('%02d', $this->hour) . ':' . sprintf('%02d', $this->minutes);
    }

    private function fixHour(): void
    {
        while ($this->hour >= 24) {
            $this->hour -= 24;
        }

        while ($this->hour < 0) {
            $this->hour += 24;
        }
    }

    private function fixMinutes(): void
    {
        while ($this->minutes >= 60) {
            $this->minutes -= 60;
            ++$this->hour;
        }

        while ($this->minutes < 00) {
            $this->minutes += 60;
            --$this->hour;
        }
    }
}
