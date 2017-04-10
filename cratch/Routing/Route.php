<?php

namespace Cratch\Routing;

use Cratch\Contracts\Routing\RouteInterface;
use Cratch\Routing\Info\RouteInfo;

class Route implements RouteInterface
{
    /**
     * @var BaseRoute
     */
    private $route;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->route = new BaseRoute();
    }

    /**
     * @param $method
     * @param string $url
     * @param string $controller
     * @param array $middleware
     */
    public function add($method, string $url, string $controller, array $middleware = []): void
    {
        $this->route->addRouter($method, $url, $controller, $middleware ?: false);
    }

    public function start(): void
    {
        $this->route->start();
    }
}