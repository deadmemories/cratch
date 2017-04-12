<?php
namespace Cratch\Storage;

use Cratch\Contracts\Files\FilesInterface;
use Cratch\Contracts\Files\MimeFileInterface;
use Cratch\Contracts\Files\UploadInterface;

class Files implements FilesInterface, MimeFileInterface, UploadInterface
{
    use  \Cratch\Storage\MimeTrait,
         \Cratch\Storage\UploadTrait;

    private $root;

    public function __construct()
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
    }

    public function get($path)
    {
        if (file_exists($path)) {
            return file_get_contents("{$this->root}/{$path}");
        }
        return false;
    }

    public function put($path, $content)
    {
        file_put_contents("{$this->root}/{$path}", $content);
        return $this;
    }

    public function append($path, $content)
    {
        file_put_contents("{$this->root}/{$path}", $content, FILE_APPEND);
        return $this;
    }

    public function delete ($path)
    {
        if (file_exists($path)) {
            return unlink($path);
        }
        return false;
    }

    public function newDir($name)
    {
        if (is_dir($name)) {
            return false;
        }
        return mkdir($name);
    }

    public function dropDir($name)
    {
        if (is_dir($name)) {
            return rmdir($name);
        }
        return false;
    }

}