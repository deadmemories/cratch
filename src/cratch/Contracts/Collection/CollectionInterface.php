<?php

namespace Cratch\Contracts\Collection;

use Cratch\Collection\Collection;

interface CollectionInterface
{
    public function count(): int;

    public function all(): array;

    public function replace(array $items): void;

    public function has(string $key): bool;

    public function remove(string $key): void;

    public function push(string $key, $data): void;

    public function get(string $key);

    public function first(): string;

    public function last(): string;

    public function map(callable $callback): Collection;

    public function pop();

    public function reverse(): Collection;
}