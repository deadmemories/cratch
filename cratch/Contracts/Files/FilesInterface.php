<?php
namespace Cratch\Contracts\Files;

interface FilesInterface
{
    public function get ($path);
    public function put ($path, $content);
    public function append ($path, $content);
//    public function upload ($path, $file);
//    public function extension ($file);
//    public function is ($type, $file);
//    public function mime ($type);
    public function delete ($path);
    public function newDir ($name);
    public function dropDir ($name);
//    public function move ($file, $to, $name);
}