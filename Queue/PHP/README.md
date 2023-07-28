## Execution of **testing.php** file

### Testing a simple queue

```shell
Enter a size of a queue: 4
Enter 1 to choose a common queue and 2 - circular queue: 1
Enter a list of values to insert in a format "1,2,3...": 1,2,3,4,5

Filling a queue of size 4 with values 1,2,3,4,5
[!] Failed to add value 5 to the queue, because it is already full

Enter an amount of elements to get from the queue: 1
[!] Got element with value 1

Enter 1 if you want to add some values to the queue and 2 if not: 1
Enter a list of values to insert in a format "1,2,3...": 1,2,3

[!] Failed to add value 1 to the queue, because it is already full
[!] Failed to add value 2 to the queue, because it is already full
[!] Failed to add value 3 to the queue, because it is already full

A queue has next values: 2, 3, 4, 
```

### Testing a circular queue

```shell
Enter a size of a queue: 3
Enter 1 to choose a common queue and 2 - circular queue: 2
Enter a list of values to insert in a format "1,2,3...": 5,6,1,19,23

Filling a queue of size 3 with values 5,6,1,19,23
[!] Failed to add value 19 to the queue, because it is already full
[!] Failed to add value 23 to the queue, because it is already full

Enter an amount of elements to get from the queue: 2
[!] Got element with value 5
[!] Got element with value 6

Enter 1 if you want to add some values to the queue and 2 if not: 1
Enter a list of values to insert in a format "1,2,3...": 9,4


A queue has next values: 1, 9, 4,
```
