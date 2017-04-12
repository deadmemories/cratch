<?php
namespace Cratch\Storage;

use Cratch\Contracts\Files\FilesInterface;

class Files implements FilesInterface
{
    use  \Cratch\Storage\MimeTrait,
         \Cratch\Storage\UploadTrait,
         \Cratch\Storage\FolderTrait;

    private $root;

    public function __construct()
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * Получить файл
     * @param $path
     * @return bool|string
     */
    public function get($path)
    {
        if (file_exists($path)) {
            return file_get_contents("{$this->root}/{$path}");
        }
        return false;
    }

    /**
     * Записать в файл с перезаписью
     * @param $path
     * @param $content
     * @return $this
     */
    public function put($path, $content)
    {
        file_put_contents("{$this->root}/{$path}", $content);
        return $this;
    }

    /**
     * Записать в файл без перезаписи
     * @param $path
     * @param $content
     * @return $this
     */
    public function append($path, $content)
    {
        file_put_contents("{$this->root}/{$path}", $content, FILE_APPEND);
        return $this;
    }

    /**
     * Удалить файл
     * @param $path
     * @return bool
     */
    public function delete ($path)
    {
        if (file_exists($path)) {
            return unlink($path);
        }
        return false;
    }
}