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

    public function testHeapify()
    {
        $input = [3, 9, 7, 1, 8, 2, 5];
        $heap = new MaxHeap($input);
        $heapifiedArray = $heap->getData();
        $this->assertEquals($this->_resultArray, $heapifiedArray);
    }
}
