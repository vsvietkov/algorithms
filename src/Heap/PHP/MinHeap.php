<?php namespace Algorithms\Heap;

use Heap;

class MinHeap extends Heap
{
    public function __construct(array $array = [])
    {
        $this->_type = HeapType::MinHeap;
        parent::__construct($array);
    }
}
