<?php

namespace Cratch\Collection;

use Cratch\Collection\Helpers\Except;
use Cratch\Collection\Helpers\Only;
use Cratch\Contracts\Collection\CollectionHelperInterface;

class Collection extends Helper implements CollectionHelperInterface
{
    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);
    }

    /**
     * @param array $keys
     */
    public function only($keys): void
    {
        $this->items = ((new Only($this->items, $keys))->all());
    }

    /**
     * @param $keys
     */
    public function except($keys): void
    {
        $this->items = (new Except($this->items, $keys))->all();
    }
}