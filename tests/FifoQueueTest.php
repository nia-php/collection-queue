<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Test\Nia\Collection\Queue;

use PHPUnit_Framework_TestCase;
use Nia\Collection\Queue\FifoQueue;

/**
 * Unit test for \Nia\Collection\Queue\FifoQueue.
 */
class FifoQueueTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Collection\Queue\FifoQueue
     */
    public function testQueue()
    {
        $queue = new FifoQueue();

        $this->assertSame(0, $queue->count());
        $this->assertSame([], iterator_to_array($queue));
        $this->assertSame(null, $queue->dequeue());

        $queue = new FifoQueue([
            'foo',
            'bar'
        ]);

        // dequeue 1st.
        $this->assertSame([
            'foo',
            'bar'
        ], iterator_to_array($queue));
        $this->assertSame(2, $queue->count());
        $this->assertSame('foo', $queue->dequeue());

        // dequeue 2nd.
        $this->assertSame([
            'bar'
        ], iterator_to_array($queue));
        $this->assertSame(1, $queue->count());
        $this->assertSame('bar', $queue->dequeue());

        // dequeue non-existing 3th.
        $this->assertSame([], iterator_to_array($queue));
        $this->assertSame(0, $queue->count());
        $this->assertSame(null, $queue->dequeue());

        // add new element.
        $this->assertSame($queue, $queue->enqueue(123));
        $this->assertSame([
            123
        ], iterator_to_array($queue));
        $this->assertSame(1, $queue->count());

        // add 2nd element.
        $this->assertSame($queue, $queue->enqueue(456));
        $this->assertSame([
            123,
            456
        ], iterator_to_array($queue));
        $this->assertSame(2, $queue->count());

        // dequeue 'em all
        $this->assertSame(123, $queue->dequeue());
        $this->assertSame(456, $queue->dequeue());

        $this->assertSame(0, $queue->count());
        $this->assertSame(null, $queue->dequeue());

        // add new element.
        $this->assertSame($queue, $queue->enqueue(123));
        $this->assertSame($queue, $queue->clear());
        $this->assertSame(0, $queue->count());
    }
}
