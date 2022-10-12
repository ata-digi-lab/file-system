<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Storage\LocalStorage\Adapter;

use Symfony\Component\Filesystem\Filesystem;
use XimplyCMS\Contracts\FileSystem\FileHandlerInterface;

final class FileHandlerAdapter implements FileHandlerInterface
{
    public function __construct(private readonly Filesystem $filesystem)
    {
    }

    public function copy(string $originFile, string $targetFile, bool $overwriteNewerFiles = false): void
    {
        $this->filesystem->copy($originFile, $targetFile, $overwriteNewerFiles);
    }

    public function mkdir(iterable|string $dirs, int $mode = 0777): void
    {
        $this->filesystem->mkdir($dirs, $mode);
    }

    public function exists(iterable|string $files): bool
    {
        return $this->filesystem->exists($files);
    }

    public function touch(iterable|string $files, int $time = null, int $atime = null): void
    {
        $this->filesystem->touch($files, $time, $atime);
    }

    public function remove(iterable|string $files): void
    {
        $this->filesystem->remove($files);
    }

    public function chmod(iterable|string $files, int $mode, int $umask = 0000, bool $recursive = false): void
    {
        $this->filesystem->chmod($files, $mode, $umask, $recursive);
    }

    public function chown(iterable|string $files, int|string $user, bool $recursive = false): void
    {
        $this->filesystem->chown($files, $user, $recursive);
    }

    public function chgrp(iterable|string $files, int|string $group, bool $recursive = false): void
    {
        $this->filesystem->chgrp($files, $group, $recursive);
    }

    public function rename(string $origin, string $target, bool $overwrite = false): void
    {
        $this->filesystem->rename($origin, $target, $overwrite);
    }

    public function symlink(string $originDir, string $targetDir, bool $copyOnWindows = false): void
    {
        $this->filesystem->symlink($originDir, $targetDir, $copyOnWindows);
    }

    public function hardlink(string $originFile, iterable|string $targetFiles): void
    {
        $this->filesystem->hardlink($originFile, $targetFiles);
    }

    public function readlink(string $path, bool $canonicalize = false): string|null
    {
        return $this->filesystem->readlink($path, $canonicalize);
    }

    public function makePathRelative(string $endPath, string $startPath): string
    {
        return $this->filesystem->makePathRelative($endPath, $startPath);
    }

    public function mirror(string $originDir, string $targetDir, \Traversable $iterator = null, array $options = []): void
    {
        $this->filesystem->mirror($originDir, $targetDir, $iterator, $options);
    }

    public function isAbsolutePath(string $file): bool
    {
        return $this->filesystem->isAbsolutePath($file);
    }

    public function tempnam(string $dir, string $prefix, string $suffix = ''): string
    {
        return $this->filesystem->tempnam($dir, $prefix, $suffix);
    }

    public function dumpFile(string $filename, $content): void
    {
        $this->filesystem->dumpFile($filename, $content);
    }

    public function appendToFile(string $filename, $content): void
    {
        $this->filesystem->appendToFile($filename, $content);
    }
}
