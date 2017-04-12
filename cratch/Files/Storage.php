<?php

namespace Cratch\Files;

use Cratch\Contracts\Files\StorageInterface;
use Cratch\Files\Traits\isTrait;
use Exceptions\FIleSystem\FileNotFoundException;

class Storage extends Folder implements StorageInterface
{
    use isTrait;

    /**
     * @var FileHelper
     */
    private $file;

    public function __construct(FileHelper $file)
    {
        $this->file = $file;
    }

    /**
     * @param string $path
     * @return mixed
     * @throws FileNotFoundException
     */
    public function getRequire(string $path)
    {
        if ($this->isFile($path)) {
            return require $path;
        }

        throw new FileNotFoundException("File does not exist at path {$path}");
    }

    /**
     * @param string $path
     * @param string $data
     * @return bool|int
     */
    public function prepend(string $path, string $data)
    {
        if ($this->exists($path)) {
            return $this->put($path, $data.$this->get($path));
        }

        return $this->put($path, $data);
    }

    /**
     * @param string $path
     * @param int|null $mode
     * @return bool|string
     */
    public function chmod(string $path, int $mode = null)
    {
        if ($mode) {
            return chmod($path, $mode);
        }
        return substr(sprintf('%o', fileperms($path)), -4);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->file, $name], [$arguments]);
    }
}