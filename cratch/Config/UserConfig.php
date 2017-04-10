<?php

namespace Cratch\Config;

use Cratch\Contracts\Config\ConfigInterface;
use Cratch\Support\Files;

class UserConfig implements ConfigInterface
{
    /**
     * @param string $key
     * @return null|void
     */
    public function get(string $key)
    {
        $keys = explode('.', $key);
        $file = array_shift($keys);

        return Files::getValueForConfig(
            $keys, Files::loadFile('../app/config/'.$file.'.php')
        );
    }
}