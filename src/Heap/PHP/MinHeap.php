<?php

namespace Vsvietkov\DataStructures\Heap;

use Vsvietkov\DataStructures\Heap\Heap;

class MinHeap extends Heap
{
    public function __construct(array $array = [])
    {
        $this->_heapType = HeapTypeEnum::MinHeap;
        parent::__construct($array);
    }
}
