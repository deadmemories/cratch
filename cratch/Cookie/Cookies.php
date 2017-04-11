<?php

namespace Cratch\Cookie;

use Cratch\Cookie\Hash;
use Cratch\Contracts\Cookie\CookieInterface;

class Cookies implements CookieInterface
{
    /**
     * @param string $key
     * @param $value
     * @param int $time
     * @param null $path
     * @param null $domain
     * @param bool $secure
     * @param bool $httponly
     * @return Cookies
     */
    public function set(
        string $key, $value, int $time = 1, $path = null, $domain = null, $secure = false, $httponly = true
    ): Cookies {
        $value = Hash::encrypt($value);
        setcookie(
            $key, $value, time() + $time * 60 * 60, $path, $domain, $secure, $httponly
        );

        return $this;
    }

    /**
     * @param string $key
     * @return bool|object|string
     */
    public function get(string $key)
    {
        if ($this->has($key)) {
            $value = Hash::decrypt($_COOKIE[$key]);

            return is_array($value) ? collection($value) : $value;
        }

        return false;
    }

    /**
     * @param string $key
     */
    public function remove(string $key): void
    {
        unset($_COOKIE[$key]);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return !empty($_COOKIE[$key]) ? true : false;
    }
}