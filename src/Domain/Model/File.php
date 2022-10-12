<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Domain\Model;

use XimplyCMS\Contracts\FileSystem\FileInterface;
use XimplyCMS\FileSystem\Domain\Exception\FileDoesNotExistException;

final class File implements FileInterface
{
    private string|null $filename = null;
    private string|null $extension = null;
    private string|null $basename = null;
    private string|null $directoryName = null;
    private int|null $fileSize = null;
    private bool|null $isWritable = null;
    private bool|null $isReadable = null;

    public function __construct(private readonly string $filePath)
    {
        if (file_exists($this->filePath)) {
            return;
        }

        throw new FileDoesNotExistException($this->filePath);
    }

    public function getPath(): string
    {
        $this->ensurePathInfoAreMapped();

        return $this->filePath;
    }

    public function getFilename(): string
    {
        $this->ensurePathInfoAreMapped();

        return $this->filename;
    }

    public function getExtension(): string
    {
        $this->ensurePathInfoAreMapped();

        return $this->extension;
    }

    public function getBasename(string|null $suffix = null): string
    {
        $this->ensurePathInfoAreMapped();

        return $suffix . $this->basename;
    }

    public function getPathname(): string
    {
        $this->ensurePathInfoAreMapped();

        return $this->directoryName;
    }

    public function getSize(): int
    {
        if (null !== $this->fileSize) {
            return $this->fileSize;

        }
        $this->fileSize = filesize($this->filePath);

        return $this->fileSize;
    }

    public function isWritable(): bool
    {
        if (null !== $this->isWritable) {
            return $this->isWritable;
        }

        $this->isWritable = is_writable($this->filePath);

        return $this->isWritable;
    }

    public function isReadable(): bool
    {
        if (null !== $this->isReadable) {
            return $this->isReadable;
        }

        $this->isReadable = is_readable($this->filePath);

        return $this->isReadable;
    }

    private function ensurePathInfoAreMapped(): void
    {
        if (null !== $this->filename) {
            return;
        }

        $this->mapPathInfoProperties();
    }

    private function mapPathInfoProperties(): void
    {
        $fileInfo = pathinfo($this->filePath);
        $this->filename = $fileInfo['filename'];
        $this->extension = $fileInfo['extension'];
        $this->basename = $fileInfo['basename'];
        $this->directoryName = $fileInfo['dirname'];
    }
}
