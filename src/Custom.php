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
}
