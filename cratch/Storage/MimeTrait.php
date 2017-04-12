<?php
namespace Cratch\Storage;

trait MimeTrait
{
    public function extension($file)
    {
        return explode('.', $file)[1];
    }

    public function is($type, $file)
    {
        if ($type == $this->mime($file)) {
            return true;
        }
        return false;
    }

    public function mime($path)
    {
        return mime_content_type ($path);
    }
}