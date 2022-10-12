<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Domain\Factory;

use XimplyCMS\Contracts\FileSystem\FileInterface;
use XimplyCMS\FileSystem\Domain\Model\File;

final class FileFactory
{
    public function createFile(string $filePath): FileInterface
    {
        return new File($filePath);
    }
}
