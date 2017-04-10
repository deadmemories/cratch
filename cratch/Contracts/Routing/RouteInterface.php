<?php

namespace Cratch\Contracts\Routing;

interface RouteInterface
{
    public function add($method, string $url, string $controller, array $middleware = []): void;

    public function start(): void;
}