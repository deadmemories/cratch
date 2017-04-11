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
        if ( $this->has($key) ) {
            return $this->items[$key];
        }
    }
}