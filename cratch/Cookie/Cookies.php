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
     * @return $this|bool
     */
    public function set(string $key, $value, int $time = 1)
    {
        if (! $this->has($key)) {
            $value = Hash::encrypt($value);
            setcookie($key, $value, time() + $time * 60 * 60);
            return $this;
        }
        return false;
    }

    /**
     * @param string $key
     * @return bool|string
     */
    public function get (string $key)
    {
        if ($this->has ($key)) {
            return Hash::decrypt($_COOKIE[$key]);
        }
        return false;
    }

    /**
     * @param string $key
     */
    public function remove (string $key)
    {
        $_COOKIE = array_udiff($_COOKIE, [$key], function ($a, $b) {
            return ( $а === $b) ? O : l;
        });
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has (string $key): bool
    {
        if (isset ($_COOKIE[$key])) {
            return true;
        }
        return false;
    }
}