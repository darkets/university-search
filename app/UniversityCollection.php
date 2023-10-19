<?php
declare(strict_types=1);

namespace App;

class UniversityCollection
{
    private array $universities;

    public function add(University $university): void
    {
        $this->universities [] = $university;
    }

    public function get(): array
    {
        return $this->universities;
    }
}
