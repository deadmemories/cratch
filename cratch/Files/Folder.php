<?php

namespace Cratch\Files;

use Cratch\Contracts\Files\FolderInterface;

class Folder implements FolderInterface
{
    /**
     * @param string $name
     * @return bool
     */
    public function chdir(string $name): bool
    {
        return chdir($name);
    }

    /**
     * @param string $name
     * @return \Directory
     */
    public function dir(string $name): \Directory
    {
        if ($this->isDir($name)) {
            return dir($name);
        }
    }


    public function getCwd(): void
    {
        return getcwd();
    }

    /**
     * @param string $path
     * @return bool
     */
    public function isDir(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * @param string $path
     * @return bool|resource
     */
    public function openDir(string $path)
    {
        if ($this->isDir($path)) {
            return opendir($path);
        }
    }

    /**
     * @param string $handle
     * @return bool|string
     */
    public function readDir(string $handle)
    {
        $handle = $this->openDir($handle);

        return $entry = readdir($handle);
    }

    /**
     * @param string $directory
     * @param int $sorting
     * @return array
     */
    public function scanDir(string $directory, int $sorting = 0): array
    {
        return scandir($directory, $sorting);
    }

    /**
     * @param string $path
     * @return bool
     */
    public function isReadable(string $path): bool
    {
        return is_readable($path);
    }

    /**
     * @param string $path
     * @param int $mode
     * @param bool $recursive
     * @param bool $force
     * @return bool
     */
    public function makeDirectory(string $path, int $mode = 0755, bool $recursive = false, bool $force = false): bool
    {
        if ($force) {
            return @mkdir($path, $mode, $recursive);
        }

        return mkdir($path, $mode, $recursive);
    }
}