<?php

namespace Cratch\Contracts\Cookie;

use Cratch\Cookie\Cookies;

interface CookieInterface
{
    public function set(string $key, $value, int $time): Cookies;

    public function get(string $key);

    public function remove(string $key): void;

    public function has(string $key): bool;
}