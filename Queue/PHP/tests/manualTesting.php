<?php require_once __DIR__ . '/../CircularQueue.php';

$size = readline('Enter a size of a queue: ');
$isCircular = readline('Enter 1 to choose a common queue and 2 - circular queue: ');
$queue = match ($isCircular) {
    '1' => new Queue($size),
    '2' => new CircularQueue($size),
};
$values = explode(',', readline('Enter a list of values to insert in a format "1,2,3...": '));

echo "\nFilling a queue of size $size with values " . implode(',', $values) . "\n";

foreach ($values as $value) {
    if (!$queue->enqueue($value)) {
        echo "[!] Failed to add value $value to the queue, because it is already full\n";
    }
}
$amountToGet = readline("\nEnter an amount of elements to get from the queue: ");

for ($i = 0; $i < $amountToGet && !$queue->isEmpty(); ++$i) {
    echo '[!] Got element with value ' . $queue->dequeue() . "\n";
}
$proceed = readline("\nEnter 1 if you want to add some values to the queue and 2 if not: ");

if ($proceed == 1) {
    $values = explode(',', readline('Enter a list of values to insert in a format "1,2,3...": '));
    echo PHP_EOL;

    foreach ($values as $value) {
        if (!$queue->enqueue($value)) {
            echo "[!] Failed to add value $value to the queue, because it is already full\n";
        }
    }
}

if ($queue->isEmpty()) {
    echo "\nA queue is empty.";
} else {
    echo "\nA queue has next values: ";

    while (!$queue->isEmpty()) {
        echo $queue->dequeue() . ', ';
    }
    echo "\n";
}
