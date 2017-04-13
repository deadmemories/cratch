<?php

namespace Cratch\Contracts\Config;

interface ConfigInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}