<?php

declare(strict_types=1);

namespace App\Entity;

class Session
{
    private int $id;
    private string $name;
    private array $talks;
    private int $totalTime;

    public function __construct()
    {
        $this->totalTime = 0;
        $this->id = 0;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTalks(): array
    {
        return $this->talks;
    }

    public function addTalk(Talk $talks): void
    {
        $this->talks[] = $talks;
    }

    public function getTotalTime(): int
    {
        return $this->totalTime;
    }

    public function setTotalTime(int $totalTime): void
    {
        $this->totalTime = $totalTime;
    }
}
