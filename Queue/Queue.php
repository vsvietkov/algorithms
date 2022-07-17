<?php

/**
 * Simple and Circular queue implementation
 *
 * Algorithm efficiency is O(1)
 */
class Queue
{
    private array $data;
    private int   $front = -1;
    private int   $rear  = -1;
    private int   $size;
    private int   $isCircular;

    /**
     * @param int $size
     * @param bool $isCircular
     */
    public function __construct(int $size, bool $isCircular = false)
    {
        $this->size       = $size < 0 ? 0 : $size;
        $this->isCircular = $isCircular;
        $this->data       = array_fill(0, $this->size, null);
    }

    /**
     * Add an element to the end of the queue
     *
     * Returns true on success, false if the queue is already full
     *
     * @param mixed $value
     * @return bool
     */
    public function enqueue(mixed $value): bool
    {
        if ($this->isFull()) {
            return false;
        }

        if ($this->isEmpty()) {
            $this->front = 0;
        }

        if ($this->rear === $this->size - 1) {
            $this->rear = 0;
        } else {
            $this->rear++;
        }
        $this->data[$this->rear] = $value;

        return true;
    }

    /**
     * Remove an element from the front of the queue
     *
     * @return mixed
     */
    public function dequeue(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }
        $returnValue              = $this->data[$this->front];
        $this->data[$this->front] = null;

        if ($this->isCircular && $this->front === $this->rear) {
            // Handle the last element in a circular queue
            $this->front = -1;
            $this->rear  = -1;
        } else if ($this->isCircular && $this->front === $this->size - 1) {
            // Move the front pointer to the beginning in a circular queue
            $this->front = 0;
        } else {
            $this->front++;
        }

        if (!$this->isCircular && $this->front > $this->rear) {
            // Handle the last element in a simple queue
            $this->front = -1;
            $this->rear  = -1;
        }

        return $returnValue;
    }

    /**
     * Check if the queue is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->front === -1;
    }

    /**
     * Check if the queue is full
     *
     * @return bool
     */
    public function isFull(): bool
    {
        if ($this->isCircular) {
            return ($this->front === 0 && $this->rear === $this->size - 1) || $this->front === $this->rear + 1;
        }

        return $this->rear === $this->size - 1;
    }

    /**
     * Get the value of the front of the queue without removing it
     *
     * @return mixed
     */
    public function peek(): mixed
    {
        return $this->data[$this->front];
    }
}
