<?php

namespace Cratch\Contracts\Collection;

interface CollectionHelperInterface
{
    public function except($keys): void;

    public function only($keys): void;
}