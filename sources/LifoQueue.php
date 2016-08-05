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

/**
 * Last-In-First-Out queue (similar to a stack) implementation.
 */
class LifoQueue implements QueueInterface
{

    /**
     * The queue as a raw list.
     *
     * @var mixed[]
     */
    private $elements = [];

    /**
     * Constructor.
     *
     * @param mixed[] $elements
     *            List with elements to add to queue.
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Collection\Queue\QueueInterface::clear()
     */
    public function clear(): QueueInterface
    {
        $this->elements = [];

        return $this;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Collection\Queue\QueueInterface::count()
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Collection\Queue\QueueInterface::dequeue()
     */
    public function dequeue()
    {
        return array_pop($this->elements);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Nia\Collection\Queue\QueueInterface::enqueue($value)
     */
    public function enqueue($value): QueueInterface
    {
        $this->elements[] = $value;

        return $this;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }
}
