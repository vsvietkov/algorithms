<?php require_once __DIR__ . '/../Deque.php';

// Create a deque with a limited capacity (e.g., 3 elements)
$deque = new Deque(3);
assert(!$deque->isFull());

// Enqueue three elements to fill the deque
$deque->enqueue(10);
$deque->enqueue(20);
$deque->enqueue(30);

// Assert the deque is now full
assert($deque->isFull());

// ==========================================

// Create an empty deque
$deque = new Deque(1);

// Assert the deque is empty
assert($deque->isEmpty());

// Add an element to the deque
$deque->enqueue(10);

// Assert the deque is not empty anymore
assert(!$deque->isEmpty());

// ==========================================

// Create a deque and add elements to the end
$deque = new Deque(3);
$deque->enqueue(10);
$deque->enqueue(20);
$deque->enqueue(30);

// Assert the elements are added correctly
assert($deque->dequeue() === 10);
assert($deque->dequeue() === 20);
assert($deque->dequeue() === 30);

// ==========================================

// Create a deque and add elements to the end
$deque = new Deque(2);
$deque->enqueue(10);
$deque->enqueue(20);

// Remove an element from the front
$deque->dequeue();

// Assert the remaining elements are correct
assert($deque->dequeue() === 20);

// ==========================================

// Create a deque and add elements to the front
$deque = new Deque(3);
$deque->enqueueFront(30);
$deque->enqueueFront(20);
$deque->enqueueFront(10);

// Assert the elements are added to the front correctly
assert($deque->dequeue() === 10);
assert($deque->dequeue() === 20);
assert($deque->dequeue() === 30);

// ==========================================

// Create a deque and add elements to the front
$deque = new Deque(3);
$deque->enqueueFront(30);
$deque->enqueueFront(20);
$deque->enqueueFront(10);

// Remove an element from the end
$deque->dequeueRear();

// Assert the remaining elements are correct
assert($deque->dequeue() === 10);
assert($deque->dequeue() === 20);
