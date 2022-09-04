<?php

namespace Alzundaz\BugFreeFiesta;

use Exception;

class Collection
{
    public function __construct(private array $items = [])
    {
    }

    public function all()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function get($key, $default = null)
    {
        return $this->items[$key] ?? $default;
    }

    public function set($key, $value)
    {
        return $this->items[$key] = $value;
    }

    /**
     * @throws Exception
     */
    public function first()
    {
        if (!$this->count())
            throw new Exception("Collection is empty");
        return $this->items[0];
    }

    /**
     * @throws Exception
     */
    public function last()
    {
        if (!$this->count())
            throw new Exception("Collection is empty");
        return $this->items[$this->count() - 1];
    }

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }
}
