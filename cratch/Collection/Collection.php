<?php

namespace Cratch\Collection;

class Collection
{
    /**
     * @var array
     */
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->replace($items);
    }

    /**
     * @param array $items
     */
    public function replace(array $items): void
    {
        foreach ( $items as $k => $v ) {
            $this->items[$k] = $v;
        }
    }
}