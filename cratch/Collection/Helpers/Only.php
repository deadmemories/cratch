<?php

namespace Cratch\Collection\Helpers;

class Only
{

    /**
     * @var Collection
     */
    private $items;

    /**
     * Only constructor.
     * @param array $items
     * @param $keys
     */
    public function __construct(array $items, $keys)
    {
        $this->items = \collection($items);

        is_array($keys) ? $this->many($keys) : $this->one($keys);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * @param array $keys
     */
    private function many(array $keys): void
    {
        $array = [];

        foreach ($keys as $key) {
            if ($this->items->has($key)) {
                $array[$key] = $this->items->get($key);
            }
        }

        if (count($array)) {
            $this->items = $array;
        }
    }

    /**
     * @param string $key
     */
    private function one(string $key): void
    {
        $array = [];

        if ($this->items->has($key)) {
            $array[$key] = $this->items->get($key);

            $this->items = $array;
        }
    }
}