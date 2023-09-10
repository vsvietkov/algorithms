<?php

declare(strict_types=1);

namespace Vsvietkov\DataStructures\Tests\Heap;

use PHPUnit\Framework\TestCase;
use Vsvietkov\DataStructures\Heap\MinHeap;

/**
 * @covers Vsvietkov\DataStructures\Heap\MinHeap
 * @covers Vsvietkov\DataStructures\Heap\Heap
 * */
final class MinHeapTest extends TestCase
{
    public function testHeapify(): void
    {
        // Test with a random unsorted array
        $heap = new MinHeap([9, 4, 7, 1, 8, 2, 5]);
        $this->assertEquals([1, 4, 2, 9, 8, 7, 5], $heap->getData());

        // Test with an already sorted array
        $sortedArray = [1, 2, 4, 5, 7, 8, 9];
        $heap = new MinHeap($sortedArray);
        $this->assertEquals($sortedArray, $heap->getData());

        // Test with a reverse sorted array
        $heap = new MinHeap([9, 8, 7, 5, 4, 2, 1]);
        $this->assertEquals([1, 4, 2, 5, 8, 9, 7], $heap->getData());

        // Test with duplicate elements
        $heap = new MinHeap([4, 2, 4, 1, 7, 2, 5]);
        $this->assertEquals([1, 2, 2, 4, 7, 4, 5], $heap->getData());
    }

    public function testIsert(): void
    {
        // Test inserting single element
        $heap = new MinHeap();
        $heap->insert(5);
        $this->assertEquals([5], $heap->getData());

        // Test inserting multiple elements
        $alreadySortedArray = [5, 10, 15, 20];
        $heap = new MinHeap();
        $heap->insert($alreadySortedArray);
        $this->assertEquals($alreadySortedArray, $heap->getData());

        // Test inserting multiple element in random order
        $heap = new MinHeap();
        $heap->insert([15, 5, 20, 10]);
        $this->assertEquals([5, 10, 20, 15], $heap->getData());

        // Test inserting duplicate elements
        $heap = new MinHeap();
        $heap->insert([5, 10, 5, 15]);
        $this->assertEquals([5, 10, 5, 15], $heap->getData());
    }

    public function testDelete(): void
    {
        $heap = new MinHeap([10, 15, 20, 17, 25, 30, 35]);
        // Test deleting the maximum element
        $heap->delete(10);
        $this->assertEquals([15, 17, 20, 35, 25, 30], $heap->getData());

        // Test deleting an internal node
        $heap->delete(17);
        $this->assertEquals([15, 25, 20, 35, 30], $heap->getData());

        // Test deleting a leaf node
        $heap->delete(35);
        $this->assertEquals([15, 25, 20, 30], $heap->getData());

        // Test deleting from an empty heap
        $heap = new MinHeap();
        $heap->delete(15);
        $this->assertEmpty($heap->getData());

        // Test deleting in a sequence till empty
        $testingArray = [3, 9, 7, 1, 8, 2, 5];
        $heap = new MinHeap($testingArray);

        foreach ($testingArray as $element) {
            $heap->delete($element);
        }
        $this->assertEmpty($heap->getData());
    }

    public function testPeek(): void
    {
        $heap = new MinHeap([1, 2, 3, 4, 5]);
        $this->assertEquals(1, $heap->peek());
        $this->assertEquals(5, count($heap->getData()));
    }

    public function testExtract(): void
    {
        // Test extracting the min element
        $heap = new MinHeap([1, 4, 2, 9, 8, 7, 5]);
        $this->assertEquals(1, $heap->extract());

        // Test extracting from an empty heap
        $heap = new MinHeap();
        $this->assertEquals(null, $heap->extract());
    }
}
