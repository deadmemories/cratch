<?php
namespace Cratch\Contracts\Cookie;

interface CookieInterface
{
    public function set(string $key, $value, int $time);
    public function get (string $key);
    public function remove (string $key);
    public function has (string $key): bool;
}