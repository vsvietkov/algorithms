<?php namespace Algorithms\Heap;

enum HeapType
{
    case MaxHeap;
    case MinHeap;
}

abstract class Heap
{
    protected HeapType $_type;
    protected array $_data;

    public function __construct(array $array = []) {
        $this->_data = $array;

        if ($arraySize = count($array)) {
            for ($i = intdiv($arraySize, 2) - 1; $i >= 0; --$i) {
                $this->heapify($this->_data, $arraySize, $i);
            }
        }
    }

    public function getData(): array
    {
        return $this->_data;
    }

    public function heapify(array &$input, int $inputSize, int $index): void
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

        for ($index = intdiv($inputSize, 2) - 1; $index >= 0; --$index) {
            $this->heapify($this->_data, $inputSize, $index);
        }
    }

    public function delete(int $value): void
    {
        $dataSize = count($this->_data);

        for ($i = 0; $i < $dataSize; ++$i) {
            if ($value === $this->_data[$i]) {
                break;
            }
        }
        [ $this->_data[$i], $this->_data[$dataSize - 1] ] = [ $this->_data[$dataSize - 1], $this->_data[$i] ];
        array_pop($this->_data);

        for ($i = intdiv($dataSize, 2) - 1; $i >= 0; --$i) {
            $this->heapify($this->_data, $dataSize, $i);
        }
    }

    public function peek(): ?int
    {
        return $this->_data[0] ?? null;
    }
}
