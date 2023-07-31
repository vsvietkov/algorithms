<?php namespace Algorithms\Heap;

use Heap;

class MaxHeap extends Heap
{
    public function __construct()
    {
        $this->_type = HeapType::MaxHeap;
    }
}
