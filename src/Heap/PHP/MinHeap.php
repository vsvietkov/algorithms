<?php namespace Algorithms\Heap;

use Heap;

class MinHeap extends Heap
{
    public function __construct()
    {
        $this->_type = HeapType::MinHeap;
    }
}
