<?php

namespace Cratch\Contracts\Files;

interface StorageInterface
{
    public function getRequire(string $path);

    public function prepend(string $path, string $data);

    public function chmod(string $path, int $mode = null);
}