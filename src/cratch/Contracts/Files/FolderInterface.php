<?php

namespace Cratch\Contracts\Files;

interface FolderInterface
{
    public function getCwd(): void;

    public function chdir(string $name): bool;

    public function dir(string $name): \Directory;

    public function scanDir(string $directory, int $sorting = 0): array;

    public function openDir(string $path);

    public function readDir(string $handle);

    public function isDir(string $path): bool;

    public function isReadable(string $path): bool;

    public function makeDirectory(string $path, int $mode = 0755, bool $recursive = false, bool $force = false): bool;
}