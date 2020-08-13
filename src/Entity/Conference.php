<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use ArrayObject;

class Conference
{
    private string $name;
    private ArrayObject $sessions;
    private DateTime $date;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSessions(): ArrayObject
    {
        return $this->sessions;
    }

    public function setSessions(ArrayObject $sessions): void
    {
        $this->sessions = $sessions;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}
