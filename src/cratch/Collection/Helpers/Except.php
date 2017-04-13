<?php

namespace Cratch\Collection\Helpers;

use Cratch\Collection\Collection;

class Except
{
    /**
     * @var Collection
     */
    private $items;

    /**
     * Except constructor.
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
        return $this->items->all();
    }

    /**
     * @param array $keys
     */
    private function many(array $keys)
    {
        foreach ($keys as $k) {
            if ($this->items->has($k)) {
                $this->items->remove($k);
            }
        }
    }

    /**
     * @param string $key
     */
    private function one(string $key): void
    {
        if ($this->items->has($key)) {
            $this->items->remove($key);
        }
    }
}