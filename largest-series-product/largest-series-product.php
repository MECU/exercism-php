<?php

class Series
{
    private $input;
    private $length;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function largestProduct(int $length): int
    {
        if ($length === 0) {
            return 1;
        }

        $this->length = $length;
        $this->validate();

        return max(array_map(['series', 'multiply'], $this->slices($this->input, $length)));
    }

    private function slices(string $input, int $length): array
    {
        $array = array_keys(str_split($input));

        return array_filter(array_map(function ($value) use ($input, $length) {
            return substr($input, $value, $length);
        }, array_splice($array, 0, -($length - 1))));
    }

    private static function multiply(string $input): int
    {
        return array_product(array_map('\intval', str_split($input)));
    }

    private function validate(): void
    {
        if (preg_match('/\D/', $this->input) === 1) {
            throw new \InvalidArgumentException('Non-digits included');
        }

        if ($this->length === '' || $this->length < 0) {
            throw new \InvalidArgumentException('Invalid length');
        }

        if (strlen($this->input) < $this->length) {
            throw new \InvalidArgumentException('Length greater than length of input string');
        }
    }
}
