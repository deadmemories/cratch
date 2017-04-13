<?php

namespace Cratch\Files\Traits;

trait isTrait
{
    /**
     * @param string $path
     * @return bool
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * @param $path
     * @return bool|int
     */
    public function lastModified(string $path)
    {
        return filemtime($path);
    }

    /**
     * @param $path
     * @return bool
     */
    public function isWritable($path): bool
    {
        return is_writable($path);
    }

    /**
     * @param $file
     * @return bool
     */
    public function isFile($file): bool
    {
        return is_file($file);
    }
}