<?php

declare(strict_types=1);

namespace App\Validator;

use App\Traits\ExtractValuesTrait;

class FileValidator
{
    use ExtractValuesTrait;

    public function isValid(string $line): bool
    {
        $time = $this->extractTime($line);
        $range = [45, 60, 30, 5];

        return in_array($time, $range, true);
    }
}
