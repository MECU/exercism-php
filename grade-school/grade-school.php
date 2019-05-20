<?php

class School
{
    private $school = [];

    public function add(string $name, int $grade): void
    {
        $this->school[$grade][] = $name;
    }

    public function grade(int $grade): array
    {
        return $this->school[$grade] ?? [];
    }

    public function studentsByGradeAlphabetical(): array
    {
        foreach ($this->school as $grade => &$list) {
            sort($list);
        }
        asort($this->school);

        return $this->school;
    }
}
