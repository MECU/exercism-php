<?php
declare(strict_types=1);

class Robot
{
    private static $names = [];
    private $name = '';

    public function getName(): string
    {
        if ($this->name !== '') {
            return $this->name;
        }

        do {
            $name = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999);
        } while (in_array($name, self::$names, true));

        self::$names[] = $this->name = $name;

        return $name;
    }

    public function reset(): void
    {
        $this->name = '';
    }
}
