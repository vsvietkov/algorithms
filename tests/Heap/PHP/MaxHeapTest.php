<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Algorithms\Heap\MaxHeap;

/**
 * @covers Algorithms\Heap\MaxHeap
 * @covers Algorithms\Heap\Heap
 * */
final class MaxHeapTest extends TestCase
{
    public function testHeapify(): void
    {
        // Test with a random unsorted array
        $heap = new MaxHeap([3, 9, 7, 1, 8, 2, 5]);
        $this->assertEquals([9, 8, 7, 1, 3, 2, 5], $heap->getData());

        // Test with an already sorted array
        $sortedArray = [9, 8, 7, 5, 3, 2, 1];
        $heap = new MaxHeap($sortedArray);
        $this->assertEquals($sortedArray, $heap->getData());

        // Test with a reverse sorted array
        $heap = new MaxHeap([1, 2, 3, 5, 7, 8, 9]);
        $this->assertEquals([9, 7, 8, 5, 2, 1, 3], $heap->getData());

        // Test with duplicate elements
        $heap = new MaxHeap([4, 2, 4, 1, 7, 2, 5]);
        $this->assertEquals([7, 4, 5, 1, 2, 2, 4], $heap->getData());
    }

    public function testIsert(): void
    {
        // Test inserting single element
        $heap = new MaxHeap();
        $heap->insert(20);
        $this->assertEquals([20], $heap->getData());

        // Test inserting multiple elements
        $alreadySortedArray = [20, 15, 10, 5];
        $heap = new MaxHeap();
        $heap->insert($alreadySortedArray);
        $this->assertEquals($alreadySortedArray, $heap->getData());

        // Test inserting multiple element in random order
        $heap = new MaxHeap();
        $heap->insert([10, 5, 20, 15]);
        $this->assertEquals([20, 15, 10, 5], $heap->getData());

        // Test inserting duplicate elements
        $heap = new MaxHeap();
        $heap->insert([20, 15, 20, 10]);
        $this->assertEquals([20, 15, 20, 10], $heap->getData());
    }

    public function testDelete(): void
    {
        $heap = new MaxHeap([40, 30, 25, 20, 15, 10]);
        // Test deleting the maximum element
        $heap->delete(40);
        $this->assertEquals([30, 20, 25, 10, 15], $heap->getData());

        // Test deleting an internal node
        $heap->delete(25);
        $this->assertEquals([30, 20, 15, 10], $heap->getData());

        // Test deleting a leaf node
        $heap->delete(15);
        $this->assertEquals([30, 20, 10], $heap->getData());

        // Test deleting from an empty heap
        $heap = new MaxHeap();
        $heap->delete(15);
        $this->assertEmpty($heap->getData());

        // Test deleting in a sequence till empty
        $testingArray = [3, 9, 7, 1, 8, 2, 5];
        $heap = new MaxHeap($testingArray);

        foreach($testingArray as $element) {
            $heap->delete($element);
        }
        $this->assertEmpty($heap->getData());
    }

    public function testPeek(): void
    {
        $heap = new MaxHeap([9, 7, 5, 4, 1]);
        $this->assertEquals(9, $heap->peek());
        $this->assertEquals(5, count($heap->getData()));
    }

    public function testExtract(): void
    {
        // Test extracting the max element
        $heap = new MaxHeap([9, 8, 7, 5, 3, 2, 1]);
        $this->assertEquals(9, $heap->extract());

        // Test extracting from an empty heap
        $heap = new MaxHeap();
        $this->assertEquals(null, $heap->extract());
    }
}
