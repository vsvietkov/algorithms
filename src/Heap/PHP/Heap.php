<?php namespace Algorithms\Heap;

use SplFixedArray;

enum HeapType
{
    case MaxHeap;
    case MinHeap;
}

abstract class Heap
{
    protected HeapType $_type;
    protected array $_data = [];

    public function heapify(SplFixedArray|array &$input, int $inputSize, int $index): void
    {
        $indexToSwap = $index;
        $leftChildIndex = 2 * $index + 1;
        $rightChildIndex = 2 * $index + 2;

        if ($leftChildIndex < $inputSize) {
            $indexToSwap = match($this->_type) {
                HeapType::MaxHeap => $input[$leftChildIndex] > $input[$indexToSwap] ? $leftChildIndex : $indexToSwap,
                HeapType::MinHeap => $input[$leftChildIndex] < $input[$indexToSwap] ? $leftChildIndex : $indexToSwap
            };
        }

        if ($rightChildIndex < $inputSize) {
            $indexToSwap = match($this->_type) {
                HeapType::MaxHeap => $input[$rightChildIndex] > $input[$indexToSwap] ? $rightChildIndex : $indexToSwap,
                HeapType::MinHeap => $input[$rightChildIndex] < $input[$indexToSwap] ? $rightChildIndex : $indexToSwap
            };
        }

        if ($indexToSwap !== $index) {
            [ $input[$indexToSwap], $input[$index] ] = [ $input[$index], $input[$indexToSwap] ];
            $this->heapify($input, $inputSize, $indexToSwap);
        }
    }

    public function insert(int $value): void
    {
        $this->_data[] = $value;

        if ( !($inputSize = count($this->_data) - 1) ) {
            return;
        }

        for ($index = $inputSize / 2 - 1; $index >= 0; --$index) {
            $this->heapify($this->_data, $inputSize, $index);
        }
    }
}