<?php

namespace Cratch\Files\Traits;

trait PhpInfoHelper
{
    /**
     * @param string $path
     * @return string
     */
    public function name(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * @param string $path
     * @return string
     */
    public function basename(string $path): string
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * @param $path
     * @return string
     */
    public function dirName($path): string
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    /**
     * @param string $path
     * @return string
     */
    public function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
}