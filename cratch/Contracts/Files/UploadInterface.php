<?php
namespace Cratch\Contracts\Files;

interface UploadInterface
{
    public function upload ($path, $file);
    public function move ($file, $to, $name);
}