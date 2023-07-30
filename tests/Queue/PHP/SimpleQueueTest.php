<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SimpleQueueTest extends TestCase
{
    public function testIsFull(): void
    {
        $string = 'user@example.com';
        $email = 'asdf@gmail.com';

        $this->assertSame($string, $email);
    }
}