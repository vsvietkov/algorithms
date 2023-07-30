<?php namespace Algorithms\Queue;

use Queue;

class CircularQueue extends Queue
{
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

        if (++$this->_rear === $this->_size) {
            // Rear reached the end of queue,
            // but the starting position is free
            $this->_rear = 0;
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
        $this->_data[$this->_front] = null;

        if ($this->_front === $this->_rear) {
            // Got all values, set queue as empty
            $this->_front = -1;
            $this->_rear = -1;
        } else if ($this->_front === $this->_size - 1) {
            // Reached the allocated end,
            // move the front pointer to the beginning in a circular queue
            $this->_front = 0;
        } else {
            $this->_front++;
        }

        return $returnValue;
    }

    public function isFull(): bool
    {
        return (
            ($this->_front === 0 && $this->_rear === $this->_size - 1) // General case, the queue is full
            || $this->_front === $this->_rear + 1 // Impossible to increment rear pointer, queue is full
        );
    }
}
