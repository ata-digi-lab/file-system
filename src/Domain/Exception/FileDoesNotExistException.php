<?php

declare(strict_types=1);

namespace XimplyCMS\FileSystem\Domain\Exception;

final class FileDoesNotExistException extends \RuntimeException
{
    public function __construct(string $filepath, int $code = 500, ?\Throwable $previous = null)
    {
        parent::__construct(sprintf('File does not exist: %s', $filepath), $code, $previous);
    }
}
