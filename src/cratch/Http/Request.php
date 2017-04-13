<?php

namespace Cratch\Http;

use Cratch\Collection\Collection;
use Cratch\Contracts\Http\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Cookies
     */
    protected $cookie;

    /**
     * @var Collection
     */
    protected $data;

    public function __construct()
    {
        $this->response = app()->make('response');
        $this->cookie = app()->make('cookie');

        $this->getAll();
    }

    /**
     * @param string $name
     * @return string
     */
    public function get(string $name): string
    {
        if ($this->has($name, false)) {
            return $_GET[$name];
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function input($name)
    {
        if ($this->has($name)) {
            return is_array($name)
                ? $this->inputWithArray($name)
                : $_POST[$name];
        }
    }

    /**
     * @param string $name
     * @param bool $post
     * @return bool
     */
    public function has(string $name, bool $post = true): bool
    {
        if (! $post) {
            return $_GET[$name] ? true : false;
        }

        return $_POST[$name] ? true : false;
    }

    /**
     * @param array $name
     * @return Collection
     */
    private function inputWithArray(array $name): Collection
    {
        $data = [];

        foreach ($name as $k) {
            if ($this->has($k)) {
                $data[$k] = $this->input($k);
            }
        }

        return collection($data);
    }

    private function getAll(): void
    {
        $data = [];

        foreach ( $_POST as $k => $v ) {
            $data['post'][$k] = $this->input($v);
        }

        foreach ( $_GET as $k => $v ) {
            $data['get'][$k] = $this->get($v);
        }

        $this->data = \collection($data);
    }

    /**
     * @param string $name
     * @return bool|mixed|string
     */
    public function __get(string $name)
    {
        if ($this->has($name)) {
            return $this->post($name);
        } elseif ($this->has($name, false)) {
            return $this->get($name);
        }

        return false;
    }
}