<?php

namespace Cratch\Routing\Info;

class RouteInfo
{
    /**
     * @var string
     */
    protected $currentUrl = '';

    /**
     * @var string
     */
    protected $currentController = '';

    /**
     * @var string
     */
    protected $currentMethod = '';

    /**
     * @var string
     */
    protected $currentFunction = '';

    /**
     * @var string
     */
    protected $routeMethod = '';

    /**
     * @return string
     */
    public function getCurrentUrl(): string
    {
        return $this->currentUrl;
    }

    /**
     * @return string
     */
    public function getCurrentMethod(): string
    {
        return $this->currentMethod;
    }

    /**
     * @return string
     */
    public function getCurrentController(): string
    {
        return $this->currentController;
    }

    /**
     * @return string
     */
    public function getCurrentFunction(): string
    {
        return $this->currentFunction;
    }

    /**
     * @return string
     */
    public function getRouteMethod(): string
    {
        return $this->currentFunction;
    }

    /**
     * @param string $url
     * @return RouteInfo
     */
    public function setCurrentUrl(string $url): RouteInfo
    {
        $this->currentUrl = $url;

        return $this;
    }

    /**
     * @param string $controller
     * @return RouteInfo
     */
    public function setCurrentController(string $controller): RouteInfo
    {
        $this->currentController = $controller;

        return $this;
    }

    /**
     * @param string $method
     * @return RouteInfo
     */
    public function setCurrentMethod(string $method): RouteInfo
{
    $this->currentMethod = $method;

    return $this;
}

    /**
     * @param string $function
     * @return RouteInfo
     */
    public function setCurrentFunction(string $function): RouteInfo
    {
        $this->currentFunction = $function;

        return $this;
    }

    /**
     * @param $method
     * @return RouteInfo
     */
    public function setRouteMethod($method): RouteInfo
    {
        $this->routeMethod = $method;

        return $this;
    }
}