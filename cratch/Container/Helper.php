<?php

namespace Cratch\Container;

class Helper
{
    protected const SINGLETON = true;
    protected const NOT_SINGLETON = false;

    /**
     * @var array
     */
    protected $bindings = [];

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @param string $name
     * @return object
     */
    protected function get(string $name)
    {
        $bind = $this->bindings[$name] ?: ['class' => $name];

        $reflection = new \ReflectionClass($bind['class']);

        $constructor = $reflection->getConstructor();

        if (is_null($constructor)) {
            return new $reflection->name();
        }

        $arguments = $constructor->getParameters();

        $dependency = $this->getDependencies($name, $arguments);

        return $reflection->newInstanceArgs($dependency);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return array
     */
    protected function getDependencies(string $name, array $arguments): array
    {
        $result = [];

        foreach ($arguments as $argument) {
            if ($this->hasParameter($name, $argument)) {
                $result[] = $this->getParameter($name, $argument);

                continue;
            }

            $result[] = is_null($class = $argument->getClass())
                ? $this->resolvePrimitive($argument)
                : $this->resolveClass($name, $argument);
        }

        return $result;
    }

    /**
     * @param string $name
     * @param \ReflectionParameter $argument
     * @return bool
     */
    protected function hasParameter(string $name, \ReflectionParameter $argument): bool
    {
        return $this->getNameForHasMethods($name, $argument) ? true : false;
    }

    /**
     * @param string $name
     * @param \ReflectionParameter $argument
     * @return object
     */
    protected function getParameter(string $name, \ReflectionParameter $argument)
    {
        if ($this->params[$name][$argument->name]) {
            return $this->params[$name][$argument->name];
        }

        $class = $this->get($this->getNameForHasMethods($name, $argument));

        return $class;
    }

    /**
     * @param string $name
     * @param \ReflectionParameter $argument
     * @return bool
     */
    protected function getNameForHasMethods(string $name, \ReflectionParameter $argument)
    {
        foreach ($this->params[$name] as $k => $v) {
            if (mb_strtolower(end(explode('\\', $k))) == mb_strtolower($argument->name)) {
                return $v;
            }
        }

        return false;
    }

    /**
     * @param \ReflectionParameter $argument
     * @return mixed
     */
    protected function resolvePrimitive(\ReflectionParameter $argument)
    {
        if ($argument->isDefaultValueAvailable()) {
            return $argument->getDefaultValue();
        }
    }

    /**
     * @param string $name
     * @param \ReflectionParameter $argument
     * @return null
     */
    protected function resolveClass(string $name, \ReflectionParameter $argument)
    {
        $result = null;
        $class = $argument->getClass()->name;
        $dependency = $this->params[$name];

        foreach ($dependency as $k => $v) {
            if ($class == $k) {
                $result = $this->make($v);
            }
        }

        return $result;
    }

    /**
     * @param string $name
     * @return bool
     */
    protected function hasBind(string $name): bool
    {
        return array_key_exists($name, $this->bindings);
    }

    /**
     * @param string $class
     * @param bool $shared
     */
    protected function setClassWithoutName(string $class, bool $shared): void
    {
        $this->bindings[$class] = compact('class');
        $this->bindings[$class]['shared'] = $shared;
    }

    /**
     * @param string $name
     * @param string $class
     * @param bool $shared
     */
    protected function setClassWithName(string $name, string $class, bool $shared): void
    {
        $this->bindings[$name] = compact('class');
        $this->bindings[$name]['shared'] = $shared;
    }
}