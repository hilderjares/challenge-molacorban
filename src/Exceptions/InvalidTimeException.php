<?php

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Exception;

class InvalidTimeException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
