<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Domain\Model;

use XimplyCMS\Contracts\FileSystem\FileInterface;
use XimplyCMS\Contracts\FileSystem\FolderInterface;

final class Folder implements FolderInterface
{
    public function __construct(private readonly string $path, private readonly string $name, private readonly array $items = [])
    {}

    public function getPath(): string
    {
        return $this->path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<int, FileInterface|FolderInterface>
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
