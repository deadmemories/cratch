<?php

namespace Cratch\Files;

use Cratch\Contracts\Files\FilesInterface;

class Files
{
    /**
     * @var FilesInterface
     */
    protected $service;

    /**
     * Files constructor.
     * @param FilesInterface $service
     */
    public function __construct(FilesInterface $service)
    {
        $this->service = $service;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->service, $name], [$arguments]);
    }
}