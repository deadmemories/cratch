<?php

namespace Cratch\Contracts\Container;

use Cratch\Container\ServiceContainer;

interface ContainerInterface
{
    public static function getInstance(): ServiceContainer;

    public function register(string $name, string $class = ''): void;

    public function registerSingleton(string $name, string $class = ''): void;

    public function setParams(string $name, array $params): void;

    public function make(string $name);
}