<?php

namespace Vsvietkov\DataStructures\Heap;

use Vsvietkov\DataStructures\Heap\HeapTypeEnum;

abstract class Heap
{
    protected HeapTypeEnum $_heapType;
    protected array $_data;

    public function __construct(array $array = [])
    {
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

    public function heapify(array &$array, int $arraySize, int $index): void
    {
        $indexToSwap = $index; // The largest element in MaxHeap and smallest in MinHeap
        $leftChildIndex = 2 * $index + 1;
        $rightChildIndex = 2 * $index + 2;

        if ($leftChildIndex < $arraySize) {
            // Compare the left child with current node
            $indexToSwap = match ($this->_heapType) {
                HeapTypeEnum::MaxHeap => $array[$leftChildIndex] > $array[$indexToSwap]
                    ? $leftChildIndex
                    : $indexToSwap,
                HeapTypeEnum::MinHeap => $array[$leftChildIndex] < $array[$indexToSwap]
                    ? $leftChildIndex
                    : $indexToSwap
            };
        }

        if ($rightChildIndex < $arraySize) {
            // Compare the right child with the left one
            $indexToSwap = match ($this->_heapType) {
                HeapTypeEnum::MaxHeap => $array[$rightChildIndex] > $array[$indexToSwap]
                    ? $rightChildIndex
                    : $indexToSwap,
                HeapTypeEnum::MinHeap => $array[$rightChildIndex] < $array[$indexToSwap]
                    ? $rightChildIndex
                    : $indexToSwap
            };
        }

        if ($indexToSwap !== $index) {
            [ $array[$indexToSwap], $array[$index] ] = [ $array[$index], $array[$indexToSwap] ];
            // Traverse through children and validate heap property
            $this->heapify($array, $arraySize, $indexToSwap);
        }
    }

    public function insert(int|array $value): void
    {
        if (is_array($value)) {
            $this->_data = array_merge($this->_data, $value);
        } else {
            $this->_data[] = $value;
        }

        if (($dataSize = count($this->_data)) === 1) {
            // There is only one element in array
            return;
        }

        // Traverse through each node with children
        for ($i = intdiv($dataSize, 2) - 1; $i >= 0; --$i) {
            $this->heapify($this->_data, $dataSize, $i);
        }
    }

    public function delete(int $value): void
    {
        $dataSize = count($this->_data);

        // Find the needed element
        for ($i = 0; $i < $dataSize; ++$i) {
            if ($value === $this->_data[$i]) {
                break;
            }
        }

        if ($i === $dataSize) {
            // The element is not found
            return;
        }
        // Swap the needed element with the latest one
        [ $this->_data[$i], $this->_data[$dataSize - 1] ] = [ $this->_data[$dataSize - 1], $this->_data[$i] ];
        array_pop($this->_data);

        if ($i !== $dataSize - 1) {
            // Ensure the heap is valid
            for ($i = intdiv($dataSize - 1, 2) - 1; $i >= 0; --$i) {
                $this->heapify($this->_data, $dataSize - 1, $i);
            }
        }
    }

    /**
     * Returns the maximum element from Max Heap or minimum element from Min Heap without deleting the node
     */
    public function peek(): ?int
    {
        return $this->_data[0] ?? null;
    }

    /**
     * Returns the max value in MaxHeap and min value in MinHeap after removing it
     */
    public function extract(): ?int
    {
        if (empty($this->_data)) {
            return null;
        }
        $deletedElement = $this->peek();
        $this->delete($deletedElement);

        return $deletedElement;
    }
}
