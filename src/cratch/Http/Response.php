<?php

namespace Cratch\Http;

use Cratch\Contracts\Http\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * @var Collection
     */
    protected $data;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->data = collection($_SERVER);

        return $this->data;
    }

    /**
     * @param int $code
     * @return Response
     */
    public function changeResponseCode(int $code): Response
    {
        http_response_code($code);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->data->get('REDIRECT_STATUS');
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->data->get('CONTENT_TYPE');
    }

    /**
     * @param string $url
     */
    public function relocation(string $url)
    {
        return header('Location: '.$url);
    }

    /**
     * @param $data
     * @param int $code
     * @return mixed
     */
    public function json($data, int $code = 200)
    {
        return $this->returnJson($data, $code);
    }

    public function __debugInfo()
    {
        return [
            $this->data,
        ];
    }
}