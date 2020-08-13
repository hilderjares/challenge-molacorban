<?php

declare(strict_types=1);

namespace App\Traits;

use Exception;

trait ExtractValuesTrait
{
    public function extractTime(string $line): int
    {
        return abs((int) filter_var($line, FILTER_SANITIZE_NUMBER_INT)) === 0 ? 5 : abs((int) filter_var($line, FILTER_SANITIZE_NUMBER_INT));
    }
}
