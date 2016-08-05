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
namespace Nia\Collection\Queue;

use IteratorAggregate;

/**
 * Interface for queue implementations.
 */
interface QueueInterface extends IteratorAggregate
{

    /**
     * Removes all elements from the queue.
     *
     * @return QueueInterface Reference to this instance.
     */
    public function clear(): QueueInterface;

    /**
     * Returns the count of elements stored in the queue.
     *
     * @return int The count of elements stored in the queue.
     */
    public function count(): int;

    /**
     * Dequeues an element from the queue.
     *
     * @return mixed Dequeued element.
     */
    public function dequeue();

    /**
     * Enqueues an element into the queue.
     *
     * @param mixed $value
     *            Element to enqueue.
     * @return QueueInterface Reference to this instance.
     */
    public function enqueue($value): QueueInterface;
}

