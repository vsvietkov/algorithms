<?php

use Vsvietkov\DataStructures\RedBlackTree\RBNode;

$tree  = new RBTree();
$count = (int)readline('Enter a number of nodes: ');
$tree->insert((int)readline('Enter a node value: '));

for ($i = 0; $i < $count - 1; ++$i) {
    $tree->insert((int)readline('Enter a node value: '));
}
echo "\n";
$tree->printContent();
echo "\n";
