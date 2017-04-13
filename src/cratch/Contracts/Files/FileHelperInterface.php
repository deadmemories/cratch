<?php

namespace Cratch\Contracts\Files;

interface FileHelperInterface
{
    public function move(string $path, string $target): bool;

    public function copy(string $path, string $target): bool;

    public function put(string $path, string $contents, bool $lock = false);

    public function append(string $path, string $data): int;

    public function type(string $path): string;
}