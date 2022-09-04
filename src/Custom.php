<?php

namespace Alzundaz\BugFreeFiesta;

class Custom
{
    public function __construct(private Collection $collection)
    {
    }

    public function add(string $str)
    {
        $this->collection->set($str, $str);
    }
}
