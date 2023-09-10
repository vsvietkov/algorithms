<?php

namespace Vsvietkov\DataStructures\Stack;

/**
 * Algorithm efficiency is O(1)
 */
class Stack
{
    private int $size;
    private int $top  = -1;
    private array $data = [];

    /**
     * @param int $size
     */
    public function __construct(int $size)
    {
        $this->size = $size < 0 ? 0 : $size;
    }

    /**
     * Add an element to the top of a stack
     *
     * Returns true on success, false if the stack is already full
     *
     * @param mixed $value
     * @return bool
     */
    public function push(mixed $value): bool
    {
        if ($this->isFull()) {
            return false;
        }
        $this->data[] = $value;
        $this->top++;

        return true;
    }

    /**
     * Remove an element from the top of a stack
     */
    public function pop(): mixed
    {
        if (!$this->isEmpty()) {
            // The definition of the 'pop' stack method requires the check for the emptiness of data storage before
            // operation execution to handle it and return NULL, for example, but in our case we do not need it
            // as this check is done in the default 'array_pop' php function.
            $this->top--;
        }

        return array_pop($this->data);
    }

    /**
     * Check if the stack is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->top === -1;
    }

    /**
     * Check if the stack is full
     *
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->size - 1 === $this->top;
    }

    /**
     * Get the value of the top element without removing it
     */
    public function peek(): mixed
    {
        return $this->data[$this->top];
    }
}
