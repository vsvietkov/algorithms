<?php

declare(strict_types=1);

namespace Vsvietkov\DataStructures\Tests\Queue;

use PHPUnit\Framework\TestCase;
use ReflectionObject;
use Vsvietkov\DataStructures\Queue\Queue;

abstract class QueueCase extends TestCase
{
    protected function _getQueueData(Queue $queue)
    {
        return (new ReflectionObject($queue))->getProperty('_data')->getValue($queue);
    }
}
