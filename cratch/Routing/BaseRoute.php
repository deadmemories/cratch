<?php

namespace Cratch\Routing;

use Cratch\Routing\Info\RouteInfo;
use Cratch\Routing\Traits\ParseUrl;
use Cratch\Routing\Traits\RouteHelper;

class BaseRoute
{
    use ParseUrl, RouteHelper;

    /**
     * @var array
     */
    protected $routers = [];

    /**
     * @var array
     */
    protected static $patterns = [
        '{integer}' => '[0-9]+',
        '{string}' => '[a-zA-Z]+',
        '{any}' => '[^/]+',
    ];

    /**
     * @var RouteInfo
     */
    private $info;

    public function __construct()
    {
        $this->info = new RouteInfo();
        $this->info->setCurrentUrl($this->returnCurrentUrl());
        $this->info->setCurrentMethod($_SERVER['REQUEST_METHOD']);
        /**
         * $this- >>request =new app()->get('request')
         * $this->>response = new app()->get('response')
         */
    }

    /**
     * @param $method
     * @param string $url
     * @param string $start
     * @param $middleware
     */
    public function addRouter(
        $method,
        string $url, string $start,
        $middleware
    ): void {
        $start = explode('@', $start);
        $controller = array_shift($start);
        $function = array_shift($start);

        $this->addToArray($controller, $function, $url, $middleware, $method);
    }

    public function start()
    {
        $matches = $this->checkRoute();

        if ($matches) {
            return $this->initRout($matches);
        } else {
            return $this->initNotFoundRout();
        }
    }

    private function initRout($matches)
    {
        if ($matches['call'] instanceof \Closure) {
            return call_user_func($this->info->getCurrentFunction());
        }

        app()->register($this->info->getCurrentController());

        if ( 1 == count($matches[0]) ) {
            return $this->callClassWithOneParam($matches);
        } else {
            return $this->callClassWithManyParams($matches);
        }
    }

    private function callClassWithOneParam($matches)
    {
        $class = app()->get($this->info->getCurrentController());
    }

    private function callClassWithManyParams($matches): void
    {
        unset($matches[0][0]);

        $class = app()->get($this->info->getCurrentController());
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    private function checkRoute()
    {
        $currentUrl = $this->info->getCurrentUrl();

        foreach ($this->routers as $k => $v) {
            $uri = $this->returnCurrentUrl(
                $this->removeSlashes(
                    $v['url'], $currentUrl
                )
            );

            if (preg_match_all(
                '#^'.$uri.'$#', $currentUrl, $matches, PREG_SET_ORDER
            )) {
                if (! $this->checkMethod($v['method'])) {
                    throw new \Exception('Incorrect request method');
                }

                if ($v['middleware']) {
                    $this->middlewares($v['middleware']);
                }

                $this->info->setCurrentController($v['controller']);
                $this->info->setCurrentMethod($v['function']);

                break;
            }
        }

        return $matches;
    }

    /**
     * @param $method
     * @return bool
     */
    private function checkMethod($method): bool
    {
        $currentMethod = $this->info->getCurrentMethod();

        if (is_array($method)) {
            foreach ($method as $key) {
                if ($currentMethod != $key) {
                    return false;
                }
            }
        } else {
            if ($currentMethod != $method) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $controller
     * @param string $function
     * @param string $url
     * @param $middleware
     * @param $method
     */
    private function addToArray(
        string $controller, string $function, string $url,
        $middleware, $method
    ): void {
        $route = [];

        $route['controller'] = $controller;
        $route['function'] = $function;
        $route['method'] = $method;
        $route['url'] = static::replaceUrl($url);
        $route['parse_url'] = static::parse($url);

        if (is_array($middleware)) {
            $route['middleware'] = $middleware['middleware'];
        }

        $this->routers[] = $route;
    }
}