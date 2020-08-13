<?php

declare(strict_types=1);

namespace App\Entity;

class Talk
{
    private string $title;
    private int $time;

    public function __construct(string $title, int $time)
    {
        $this->title = $title;
        $this->time = $time;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }
}
