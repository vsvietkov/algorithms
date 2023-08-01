<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Algorithms\Heap\MaxHeap;

/**
 * @covers Algorithms\Heap\MaxHeap
 * @covers Algorithms\Heap\Heap
 * */
final class MaxHeapTest extends TestCase
{
    /**
     *               9
     *        8             7
     *    1       3     2       5
     */
    private array $_resultArray = [9, 8, 7, 1, 3, 2, 5];
    
    private array $_startingArray = [3, 9, 7, 1, 8, 2, 5];

    public function testHeapify(): void
    {
        $heap = new MaxHeap($this->_startingArray);
        $heapifiedArray = $heap->getData();
        $this->assertEquals($this->_resultArray, $heapifiedArray);
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
    }

    public function testPeek(): void
    {
        $data = array_reverse($this->_resultArray);
        $this->assertNotEquals($data[0], $this->_resultArray[0]);
        $heap = new MaxHeap($data);
        $this->assertEquals($this->_resultArray[0], $heap->peek());
    }

    public function testExtract(): void
    {
        $heap = new MaxHeap($this->_resultArray);
        $maxElement = $heap->extract();
        $this->assertEquals($this->_resultArray[0], $maxElement);
        $this->assertEquals($this->_resultArray[1], $heap->peek());

        $heap = new MaxHeap();
        $this->assertEquals(null, $heap->extract());
    }
}
