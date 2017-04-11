<?php
namespace Cratch\Storage;

trait MimeTrait
{
    /**
     * Расширение файла
     * @param $file
     * @return mixed
     */
    public function extension($file)
    {
        return explode('.', $file)[1];
    }

    /**
     * Принадлежит ли файл типу
     * @param $type
     * @param $file
     * @return bool
     */
    public function is($type, $file)
    {
        if ($type == $this->mime($file)) {
            return true;
        }
        return false;
    }

    /**
     * Получить mime тип файла
     * @param $path
     * @return string
     */
    public function mime($path)
    {
        return mime_content_type ($path);
    }
}