## Execution of **testing.php** file

```shell
Testing a simple queue...
Filling a queue of size 3 with values 1,5,2,10
[!] Failed to add value 10 to the queue, because it is already full

Visualization of a queue:
front     rear
|         |
1 -> 5 -> 2

Getting first 2 values in the queue: 1 5 

Visualization of a queue:
           front,rear
                |
null -> null -> 2

Trying to add a new value to the queue...
[!] Failed to add a new value to the queue, because it should be reinitialized first
Getting all values left in the queue: 2 
Queue is empty now

====================================

Testing a circular queue...
Filling a circular queue of size 3 with values 1,5,2,10,15
[!] Failed to add value 10 to the queue, because it is already full
[!] Failed to add value 15 to the queue, because it is already full

Visualization of a queue:
front     rear
|         |
1 -> 5 -> 2

Getting first 2 values in the queue: 1 5 

Visualization of a queue:
           front,rear
                |
null -> null -> 2

Trying to add 2 new values to the queue...

Visualization of a queue:
    rear  front
      |     |
10 -> 15 -> 2

Getting all values left in the queue: 2 10 15 
Queue is empty now
```
