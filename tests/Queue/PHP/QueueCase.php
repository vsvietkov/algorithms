<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Algorithms\Queue\Queue;

abstract class QueueCase extends TestCase
{
    protected function _getQueueData(Queue $queue) {
        return (new ReflectionObject($queue))->getProperty('_data')->getValue($queue);
    }
}
