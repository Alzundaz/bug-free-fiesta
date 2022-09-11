<?php

namespace Alzundaz\BugFreeFiesta;

class Custom
{
    /**
     * @param Collection<string, string> $collection
     */
    public function __construct(private Collection $collection)
    {
    }

    public function add(string $str): void
    {
        $this->collection->set($str, $str);
    }

    public function get(string $str): string | null
    {
        return $this->collection->get($str);
    }
}
