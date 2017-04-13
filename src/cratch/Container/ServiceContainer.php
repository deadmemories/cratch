<?php

namespace Cratch\Container;

use Cratch\Contracts\Container\ContainerInterface;

class ServiceContainer extends Helper implements ContainerInterface
{
    /**
     * @var ServiceContainer
     */
    protected static $instance;

    /**
     * @return ServiceContainer
     */
    public static function getInstance(): ServiceContainer
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param string $name
     * @param string $class
     */
    public function register(string $name, string $class = ''): void
    {
        if (! $class) {
            $this->setClassWithoutName($name, self::NOT_SINGLETON);
        } else {
            $this->setClassWithName($name, $class, self::NOT_SINGLETON);
        }
    }

    /**
     * @param string $name
     * @param string $class
     */
    public function registerSingleton(string $name, string $class = ''): void
    {
        if (! $class) {
            $this->setClassWithoutName($name, self::SINGLETON);
        } else {
            $this->setClassWithName($name, $class, self::SINGLETON);
        }
    }

    /**
     * @param string $name
     * @param array $params
     * @throws ServiceException
     */
    public function setParams(string $name, array $params): void
    {
        if (! $this->hasBind($name)) {
            throw new ServiceException('Incorrect name');
        }

        foreach ($params as $key => $value) {
            $this->params[$name][$key] = $value;
        }
    }

    /**
     * @param string $name
     * @return object
     */
    public function make(string $name)
    {
        return $this->get($name, $this);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return $this->hasBind($name);
    }
}