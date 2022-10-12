<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Storage\LocalStorage;

use XimplyCMS\Contracts\FileSystem\FileHandlerInterface;
use XimplyCMS\Contracts\FileSystem\FileInterface;
use XimplyCMS\Contracts\FileSystem\FolderInterface;
use XimplyCMS\Contracts\FileSystem\StorageDriverInterface;

final class LocalStorageDriver implements StorageDriverInterface
{
    public function __construct(private readonly FileHandlerInterface $fileHandler)
    {}

    public function createFolder(string $folderPath): void
    {
        // TODO: Implement createFolder() method.
    }

    public function renameFolder(FolderInterface $folder, FolderInterface $folderToBeRenamed): void
    {
        // TODO: Implement renameFolder() method.
    }

    public function deleteFolder(FolderInterface $folder): void
    {
        // TODO: Implement deleteFolder() method.
    }

    public function createFile(string $filePath, string $content): void
    {
        $this->fileHandler->appendToFile($filePath, $content);
    }

    public function renameFile(FileInterface $file, FileInterface $fileToBeRenamed): void
    {
        // TODO: Implement renameFile() method.
    }

    public function deleteFile(FileInterface $file): void
    {
        // TODO: Implement deleteFile() method.
    }
}
