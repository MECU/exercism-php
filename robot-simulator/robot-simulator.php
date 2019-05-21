<?php
declare(strict_types=1);

class Robot
{
    public const DIRECTION_NORTH = 0;
    public const DIRECTION_EAST = 90;
    public const DIRECTION_SOUTH = 180;
    public const DIRECTION_WEST = 270;

    public $position;
    public $direction;

    public function __construct(array $pos, int $dir)
    {
        $this->position = $pos;
        $this->direction = $dir;
    }

    public function turnRight(): self
    {
        $this->direction += 90;
        if ($this->direction > 359) {
            $this->direction -= 360;
        }

        return $this;
    }

    public function turnLeft(): self
    {
        $this->direction -= 90;
        if ($this->direction < 0) {
            $this->direction += 360;
        }

        return $this;
    }

    public function advance(): self
    {
        switch ($this->direction) {
            case self::DIRECTION_NORTH:
                ++$this->position[1];
                break;
            case self::DIRECTION_EAST:
                ++$this->position[0];
                break;
            case self::DIRECTION_SOUTH:
                --$this->position[1];
                break;
            case self::DIRECTION_WEST:
                --$this->position[0];
                break;
        }

        return $this;
    }

    public function instructions(string $instruction): void
    {
        // Only LRA are allowed
        if (preg_match('/[^LRA]/', $instruction)) {
            throw new InvalidArgumentException;
        }

        $iMax = strlen($instruction);
        for ($i = 0; $i < $iMax; ++$i) {
            switch ($instruction[$i]) {
                case 'A':
                    $this->advance();
                    break;
                case 'L':
                    $this->turnLeft();
                    break;
                case 'R':
                    $this->turnRight();
                    break;
            }
        }
    }
}
