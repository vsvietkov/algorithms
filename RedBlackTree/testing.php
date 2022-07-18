<?php require_once 'RBTree.php';

$tree       = new RBTree();
$count      = (int)readline('Enter a number of nodes: ');
$tree->root = $tree->insert(null, (int)readline('Enter a node value: '));

for ($i = 0; $i < $count - 1; ++$i) {
    $tree->insert($tree->root, (int)readline('Enter a node value: '));
}
echo "\n";
$tree->printContent();
echo "\n";
