## Execution of **testing.php** file

```shell
Testing a simple queue...

Enter a size of a queue: 3
Enter 1 to choose a common queue and 2 - circular queue: 1
Enter a list of values to insert in a format "1,2,3...": 2,5,16,102
Filling a queue of size 3 with values 2,5,16,102
[!] Failed to add value 102 to the queue, because it is already full
Enter an amount of elements to get from the queue: 2
[!] Got element with value 2
[!] Got element with value 5
Enter 1 if you want to add some values to the queue and 2 if not: 1
Enter a list of values to insert in a format "1,2,3...": 2,7
[!] Failed to add value 2 to the queue, because it is already full
[!] Failed to add value 7 to the queue, because it is already full
A queue has next values: 16, 
```

```shell
Testing a circular queue...

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
