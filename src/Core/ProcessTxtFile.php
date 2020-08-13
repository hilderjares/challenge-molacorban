<?php

declare(strict_types=1);

namespace App\Core;

use Iterator;

class ProcessTxtFile implements FileInterface
{
    private string $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function read(): Iterator
    {
        $openFile = fopen($this->file, 'r');

        while (!feof($openFile)) {
            yield fgets($openFile);
        }
        fclose($openFile);
    }
}
