<?php

declare(strict_types=1);

namespace App\Core;

use Iterator;

interface FileInterface
{
    public function read(): Iterator;
}
