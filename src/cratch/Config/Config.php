<?php

namespace Cratch\Config;

use Cratch\Contracts\Config\ConfigInterface;

class Config
{
    /**
     * @var ConfigInterface
     */
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->config, $name], $arguments);
    }
}