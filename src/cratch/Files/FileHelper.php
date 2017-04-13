<?php

namespace Cratch\Files;

use Cratch\Contracts\Files\FileHelperInterface;

abstract class FileHelper implements FileHelperInterface
{
    /**
     * @param string $path
     * @param string $target
     * @return bool
     */
    public function move(string $path, string $target): bool
    {
        return rename($path, $target);
    }

    /**
     * @param string $path
     * @param string $target
     * @return bool
     */
    public function copy(string $path, string $target): bool
    {
        return copy($path, $target);
    }

    /**
     * @param string $path
     * @param string $contents
     * @param bool $lock
     * @return bool|int
     */
    public function put(string $path, string $contents, bool $lock = false)
    {
        return file_put_contents($path, $contents, $lock ? LOCK_EX : 0);
    }

    /**
     * @param string $path
     * @param string $data
     * @return int
     */
    public function append(string $path, string $data): int
    {
        return file_put_contents($path, $data, FILE_APPEND);
    }

    /**
     * @param string $path
     * @return string
     */
    public function type(string $path): string
    {
        return filetype($path);
    }
}