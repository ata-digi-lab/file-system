<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Domain\Factory;

use XimplyCMS\Contracts\FileSystem\FolderInterface;
use XimplyCMS\FileSystem\Domain\Model\Folder;

final class FolderFactory
{
    public function createFolder(string $path, string $name, array $items = []): FolderInterface
    {
        return new Folder($path, $name, $items);
    }
}
