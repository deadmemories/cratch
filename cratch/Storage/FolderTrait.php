<?php
namespace Cratch\Storage;

// можно добавить там скопировать переименовать и тд
trait FolderTrait
{
    /**
     * Создать директорию
     * @param $name
     * @return bool
     */
    public function newDir($name)
    {
        if (is_dir($name)) {
            return false;
        }
        return mkdir($name);
    }

    /**
     * Удалить директорию
     * @param $name
     * @return bool
     */
    public function dropDir($name)
    {
        if (is_dir($name)) {
            return rmdir($name);
        }
        return false;
    }
}