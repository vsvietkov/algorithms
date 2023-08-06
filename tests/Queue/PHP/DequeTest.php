<?php declare(strict_types=1);

require_once __DIR__ . '/QueueCase.php';
use Algorithms\Queue\Deque;

/**
 * @covers Algorithms\Queue\Deque
 * @covers Algorithms\Queue\CircularQueue
 * @covers Algorithms\Queue\Queue
 */
final class DequeTest extends QueueCase
{
    public function testEnqueueFront(): void
    {
        $deque = new Deque(4);
        // Prepare the sample
        $deque->enqueue(10);
        $deque->enqueue(20);
        $deque->enqueue(30);
        $this->assertEquals([10, 20, 30, null], $this->_getQueueData($deque));
        $deque->dequeue();
        $deque->dequeue();
        $this->assertEquals([null, null, 30, null], $this->_getQueueData($deque));

        // Test inserting in front
        $this->assertTrue($deque->enqueueFront(40));
        $this->assertEquals([null, 40, 30, null], $this->_getQueueData($deque));

        // Test inserting in front with circular feature
        $this->assertTrue($deque->enqueueFront(50));
        $this->assertTrue($deque->enqueueFront(60));
        $this->assertEquals([50, 40, 30, 60], $this->_getQueueData($deque));

        // Test inserting in front into full deque
        $this->assertFalse($deque->enqueueFront(70));

        // Test inserting in empty deque
        $deque = new Deque(2);
        $this->assertTrue($deque->enqueueFront(30));
        $this->assertEquals([30, null], $this->_getQueueData($deque));
    }

    public function testDequeueRear(): void
    {
        $deque = new Deque(4);
        // Prepare the sample
        $deque->enqueue(10);
        $deque->enqueue(20);
        $deque->enqueue(30);
        $this->assertEquals([10, 20, 30, null], $this->_getQueueData($deque));

        // Test dequeue from rear
        $this->assertEquals(30, $deque->dequeueRear());
        $this->assertEquals([10, 20, null, null], $this->_getQueueData($deque));

        // Test dequeue from rear with circular feature
        $deque->enqueueFront(40);
        $this->assertEquals([10, 20, null, 40], $this->_getQueueData($deque));
        $this->assertEquals(20, $deque->dequeueRear());
        $this->assertEquals(10, $deque->dequeueRear());
        $this->assertEquals([null, null, null, 40], $this->_getQueueData($deque));

        // Test dequeue from rear all elements
        $this->assertEquals(40, $deque->dequeueRear());
        $this->assertEquals([null, null, null, null], $this->_getQueueData($deque));

        // Test dequeue from rear in empty deque
        $this->assertEquals(null, $deque->dequeueRear());
    }
}
