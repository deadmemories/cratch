<?php
namespace Cratch\Cookie;

use Cratch\Cookie\Hash;
use Cratch\Contracts\Cookie\CookieInterface;

class Cookies implements CookieInterface
{
    /**
     * @param string $key
     * @param string $value
     * @param int $time
     * @return $this
     */
    public function set(string $key, $value, int $time = 1)
    {
        $value = Hash::encrypt($value);
        setcookie($key, $value, time() + $time * 60 * 60);
        return $this;
    }

    /**
     * @param string $key
     * @return bool|string
     */
    public function get (string $key): bool
    {
        if ($this->has ($key)) {
            return Hash::decrypt($_COOKIE[$key]);
        }
        return false;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function remove (string $key): bool
    {
        if ($this->has ($key)) {
            unset($_COOKIE[$key]);
        }
        return false;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has (string $key): bool
    {
        return $_COOKIE[$key] ?? false;
    }
}