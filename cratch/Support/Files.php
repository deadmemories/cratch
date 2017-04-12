<?php

namespace Cratch\Support;

use Exceptions\FIleSystem\FileNotFoundException;

class Files
{
    /**
     * @param string $path
     * @return mixed
     * @throws FileNotFoundException
     */
    public static function loadFile(string $path)
    {
        if (file_exists($path)) {
            return include $path;
        } else {
            throw new FileNotFoundException('Incorrect path to file'.$path);
        }
    }

    /**
     * @param array $keys
     * @param array $values
     * @return array|mixed
     */
    public static function getValueForConfig(array $keys, array $values)
    {
        foreach ($keys as $k) {
            $values = $values[$k];
        }

        return $values;
    }
}