<?php
namespace Cratch\Storage;


trait UploadTrait
{
    /**
     * Переместить загружаемый файл
     * @param $file
     * @param $to
     * @param $name
     * @return bool
     */
    public function move($file, $to, $name)
    {
        return move_uploaded_file ($file, "{$to}/{$name}");
    }

    /**
     * Был ли это загружаемый файл через метод POST
     * @param $path
     * @param $file
     * @return bool
     */
    public function upload($path, $file)
    {
        if (is_uploaded_file ($file['tmp_name'])) {
            return $this->move($file['tmp_name'], $path, $file['name']);
        }
        return false;
    }
}