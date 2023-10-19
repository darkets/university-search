<?php
declare(strict_types=1);

namespace App;

class University
{
    private string $name;
    private array $domains;

    public function __construct(string $name, array $domains)
    {
        $this->name = $name;
        $this->domains = $domains;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDomains(): array
    {
        return $this->domains;
    }
}
