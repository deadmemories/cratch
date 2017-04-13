<?php

namespace Cratch\Contracts\Http;

interface RequestInterface
{
    public function get(string $name): string;

    public function input($name);

    public function has(string $name, bool $post = true): bool;
}