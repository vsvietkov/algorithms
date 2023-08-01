<?php namespace Algorithms\Heap;

use Algorithms\Heap\Heap;

class MaxHeap extends Heap
{
    public function __construct(array $array = [])
    {
        $this->_type = HeapType::MaxHeap;
        parent::__construct($array);
    }
}
