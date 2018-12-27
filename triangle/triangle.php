<?php

class Triangle
{
    private $a;
    private $b;
    private $c;

    public function __construct(float $a, float $b, float $c)
    {
        if ($a === 0.0 || $b === 0.0 || $c === 0.0) {
            throw new \Exception();
        }
        if ($a + $b < $c || $a + $c < $b || $c + $b < $a ) {
            throw new \Exception();
        }

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function kind(): string
    {
        if ($this->a === $this->b && $this->b === $this->c) {
            return 'equilateral';
        }

        if ($this->a === $this->b || $this->a === $this->c ||$this->b === $this->c) {
            return 'isosceles';
        }

        if ($this->a + $this->b === $this->c || $this->a + $this->c === $this->b || $this->c + $this->b === $this->a) {
            return 'degenerate';
        }

        return 'scalene';
    }
}
