<?php
namespace Cratch\Storage;


trait UploadTrait
{
    public function move($file, $to, $name)
    {
        return move_uploaded_file ($file, "{$to}/{$name}");
    }

    public function upload($path, $file)
    {
        if (is_uploaded_file ($file['tmp_name'])) {
            return $this->move($file['tmp_name'], $path, $file['name']);
        }
        return false;
    }
}