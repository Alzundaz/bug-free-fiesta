<?php

namespace Alzundaz\BugFreeFiesta;

use Exception;

/**
 * @template KEY string | int
 * @template VALUE
 */
class Collection
{
    /**
     * @param array<VALUE> $items
     */
    public function __construct(private array $items = [])
    {
    }

    /**
     * @return array<VALUE>
     */
    public function all(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @param KEY $key
     * @param VALUE|null $default
     * @return VALUE|null
     */
    public function get(mixed $key, mixed $default = null)
    {
        return $this->items[$key] ?? $default;
    }

    /**
     * @param KEY $key
     * @param VALUE $value
     * @return VALUE
     */
    public function set(mixed $key, mixed $value)
    {
        return $this->items[$key] = $value;
    }

    /**
     * @throws Exception
     * @return VALUE
     */
    public function first()
    {
        if (!$this->count())
            throw new Exception("Collection is empty");
        return $this->items[0];
    }

    /**
     * @throws Exception
     * @return VALUE
     */
    public function last()
    {
        if (!$this->count())
            throw new Exception("Collection is empty");
        return $this->items[$this->count() - 1];
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }
}
