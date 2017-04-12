<?php
namespace Cratch\Storage;

use Cratch\Contracts\Files\FilesInterface;

class Files implements FilesInterface
{
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

    public function upload($path, $file)
    {
        if (is_uploaded_file ($file['tmp_name'])) {
            return $this->move($file['tmp_name'], $path, $file['name']);
        }
        return false;
    }

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

    public function move($file, $to, $name)
    {
        return move_uploaded_file ($file, "{$to}/{$name}");
    }
}