<?php

namespace Cratch\Support;

use Cratch\Support\Exceptions\Files\FilesException;

class Files
{
    /**
     * @param string $path
     * @return mixed
     * @throws FilesException
     */
    public static function loadFile(string $path)
    {
        if (file_exists($path)) {
            return include $path;
        } else {
            throw new FilesException($path);
        }
    }

    /**
     * @param array $keys
     * @param array $values
     * @return array|mixed
     */
    public static function getValueForConfig(array $keys, array $values)
    {
        foreach ( $keys as $k ) {
            $values = $values[$k];
        }

        return $values;
    }
}