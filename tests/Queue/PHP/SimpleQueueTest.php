<?php

declare(strict_types=1);

namespace Vsvietkov\DataStructures\Tests\Queue;

use PHPUnit\Framework\TestCase;
use Vsvietkov\DataStructures\Queue\Queue;

/** @covers Vsvietkov\DataStructures\Queue\Queue */
final class SimpleQueueTest extends TestCase
{
    public function testIsFull(): void
    {
        $queue = new Queue(3);
        $this->assertFalse($queue->isFull());
        $queue->enqueue(10);
        $queue->enqueue(20);
        $queue->enqueue(30);
        $this->assertTrue($queue->isFull());
        $queue->dequeue();
        $this->assertTrue($queue->isFull());
    }

    public function testIsEmpty(): void
    {
        $queue = new Queue(2);
        $this->assertTrue($queue->isEmpty());
        $queue->enqueue(10);
        $this->assertFalse($queue->isEmpty());
        $queue->dequeue();
        $this->assertTrue($queue->isEmpty());
    }

    public function testPeek(): void
    {
        $queue = new Queue(1);
        $queue->enqueue(10);
        $this->assertEquals(10, $queue->peek());
        $this->assertTrue($queue->isFull());

        $queue->dequeue();
        $this->assertTrue($queue->isEmpty());
        $this->assertEquals(null, $queue->peek());
    }

    public function testEnqueue(): void
    {
        $queue = new Queue(3);
        $dataToAssert = [10, 20, 30];

        foreach ($dataToAssert as $value) {
            $this->assertTrue($queue->enqueue($value));
        }
        $this->assertTrue($queue->isFull());
        $this->assertFalse($queue->enqueue(40));
    }

    public function testDequeue(): void
    {
        $queue = new Queue(3);
        $dataToAssert = [10, 20, 30];

        foreach ($dataToAssert as $value) {
            $queue->enqueue($value);
        }
        $this->assertTrue($queue->isFull());

        foreach ($dataToAssert as $value) {
            $this->assertEquals($value, $queue->dequeue());
        }
        $this->assertTrue($queue->isEmpty());
        $this->assertEquals(null, $queue->dequeue());
    }
}
