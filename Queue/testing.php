<?php
require_once "Queue.php";

echo "Testing a simple queue...\n";
$size   = 3;
$values = [1, 5, 2, 10];
$queue  = new Queue(3);

echo "Filling a queue of size $size with values " . implode(',', $values) . "\n";

foreach ($values as $value) {
    if (!$queue->enqueue($value)) {
        echo "[!] Failed to add value $value to the queue, because it is already full\n";
    }
}
echo "Getting first 2 values in the queue: ";

for ($i = 0; $i < 2; ++$i) {
    echo $queue->dequeue() . ' ';
}
echo "\n";

echo "Trying to add a new value to the queue...\n";

if (!$queue->enqueue(10)) {
    echo "[!] Failed to add a new value to the queue, because it should be reinitialized first\n";
}
echo "Getting all values left in the queue: ";

while ($value = $queue->dequeue()) {
    echo $value . ' ';
}
echo "\nQueue is empty now\n\n";

echo  "====================================\n";

echo "\nTesting a circular queue...\n";
$size   = 3;
$values = [1, 5, 2, 10, 15];
$queue  = new Queue(3, true);

echo "Filling a circular queue of size $size with values " . implode(',', $values) . "\n";

foreach ($values as $value) {
    if (!$queue->enqueue($value)) {
        echo "[!] Failed to add value $value to the queue, because it is already full\n";
    }
}
echo "Getting first 2 values in the queue: ";

for ($i = 0; $i < 2; ++$i) {
    echo $queue->dequeue() . ' ';
}
echo "\n";
echo "Trying to add 2 new values to the queue...\n";
$queue->enqueue(10);
$queue->enqueue(15);
echo "Getting all values left in the queue: ";

while ($value = $queue->dequeue()) {
    echo $value . ' ';
}
echo "\nQueue is empty now\n";
