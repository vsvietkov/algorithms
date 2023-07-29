<?php require_once __DIR__ . '/CircularQueue.php';

class Deque extends CircularQueue
{
    public function enqueueFront(mixed $value): bool
    {
        if ($this->isFull()) {
            // Depending on the requirement, we can throw an error here
            return false;
        }

        if ($this->isEmpty()) {
            $this->_front = 0;
        } elseif ($this->_front === 0) {
            $this->_front = $this->_size - 1;
        } else {
            $this->_front--;
        }
        $this->_data[$this->_front] = $value;

        return true;
    }

    public function dequeueRear(): mixed
    {
        if ($this->isEmpty()) {
            // Depending on the requirement, we can throw an error here
            return null;
        }
        $returnValue = $this->_data[$this->_rear];
        $this->_data[$this->_rear] = null;

        if ($this->_front === $this->_rear) {
            // Got all values, set queue as empty
            $this->_front = -1;
            $this->_rear = -1;
        } else if ($this->_rear < 1) {
            // Reached the starting position,
            // move the rear pointer to the end
            $this->_rear = $this->_size - 1;
        } else {
            $this->_rear--;
        }

        return $returnValue;
    }
}
