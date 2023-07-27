<?php

/**
 * Simple Queue implementation
 */
class Queue
{
    private array $_data;
    private int $_front = -1;
    private int $_rear  = -1;
    private int $_size;

    public function __construct(int $size = 0)
    {
        $this->_size = $size < 0 ? 0 : $size;
        $this->_data = array_fill(0, $this->_size, null);
    }

    /**
     * Add an element to the end of the queue
     *
     * Returns true on success, false if the queue is already full
     */
    public function enqueue(mixed $value): bool
    {
        if ($this->isFull()) {
            // Depending on the requirement, we can throw an error here
            return false;
        }

        if ($this->isEmpty()) {
            $this->_front = 0;
        }

        if ($this->_rear === $this->_size - 1) {
            $this->_rear = 0;
        } else {
            $this->_rear++;
        }
        $this->_data[$this->_rear] = $value;

        return true;
    }

    /**
     * Remove an element from the front of the queue
     */
    public function dequeue(): mixed
    {
        if ($this->isEmpty()) {
            // Depending on the requirement, we can throw an error here
            return null;
        }
        $returnValue = $this->_data[$this->_front];
        $this->_data[$this->_front++] = null;

        if ($this->_front > $this->_rear) {
            // Set queue as empty
            $this->_front = -1;
            $this->_rear = -1;
        }
        return $returnValue;
    }

    public function isEmpty(): bool
    {
        return $this->_front === -1;
    }

    public function isFull(): bool
    {
        return $this->_rear === $this->_size - 1;
    }

    /**
     * Get the value of the front of the queue without removing it
     */
    public function peek(): mixed
    {
        return $this->_data[$this->_front];
    }
}
