<?php
namespace Cratch\Contracts\Files;

interface MimeFileInterface
{
    public function extension ($file);
    public function is ($type, $file);
    public function mime ($type);
}