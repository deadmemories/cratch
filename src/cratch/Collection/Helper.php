<?php

namespace Cratch\Collection;

use Cratch\Contracts\Collection\CollectionInterface;

class Helper implements CollectionInterface
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * Helper constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->replace($items);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return (array) $this->items;
    }


    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * @param array $items
     */
    public function replace(array $items): void
    {
        foreach ($items as $k => $v) {
            $this->items[$k] = $v;
        }
    }

    /**
     * @param string $key
     */
    public function remove(string $key): void
    {
        if ($this->has($key)) {
            unset($this->items[$key]);
        }
    }

    /**
     * @param string $key
     * @param $data
     */
    public function push(string $key, $data): void
    {
        $this->items[$key] = $data;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $this->items[$key];
        }
    }

    /**
     * @return string
     */
    public function first(): string
    {
        return $this->get('[0]');
    }

    /**
     * @return string
     */
    public function last(): string
    {
        return end($this->items);
    }

    /**
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback): Collection
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);

        return collection(array_combine($keys, $items));
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    /**
     * @return Collection
     */
    public function reverse(): Collection
    {
        return collection(array_reverse($this->items, true));
    }
}