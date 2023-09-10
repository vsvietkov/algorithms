<?php

namespace Vsvietkov\DataStructures\Heap;

use Vsvietkov\DataStructures\Heap\Heap;

class MaxHeap extends Heap
{
    public function __construct(array $array = [])
    {
        $this->_heapType = HeapTypeEnum::MaxHeap;
        parent::__construct($array);
    }
}
