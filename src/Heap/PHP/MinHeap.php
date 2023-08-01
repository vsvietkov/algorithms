<?php namespace Algorithms\Heap;

use Algorithms\Heap\Heap;

class MinHeap extends Heap
{
    public function __construct(array $array = [])
    {
        $this->_heapType = HeapTypeEnum::MinHeap;
        parent::__construct($array);
    }
}
