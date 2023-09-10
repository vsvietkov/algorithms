<?php

use Vsvietkov\DataStructures\TreeTraversal\Node;

/**
 * @param Node $root
 * @param mixed $value
 * @return Node|null
 */
function insertLeft(Node $root, mixed $value): ?Node
{
    $root->leftChild = new Node($value);
    return $root->leftChild;
}

/**
 * @param Node $root
 * @param mixed $value
 * @return Node|null
 */
function insertRight(Node $root, mixed $value): ?Node
{
    $root->rightChild = new Node($value);
    return $root->rightChild;
}

/**
 * @param Node|null $root
 * @return void|null
 */
function inorderTraversal(?Node $root)
{
    if ($root === null) {
        return null;
    }
    inorderTraversal($root->leftChild);
    echo $root->value . ' -> ';
    inorderTraversal($root->rightChild);
}

/**
 * @param Node|null $root
 * @return void|null
 */
function preorderTraversal(?Node $root)
{
    if ($root === null) {
        return null;
    }
    echo $root->value . ' -> ';
    preorderTraversal($root->leftChild);
    preorderTraversal($root->rightChild);
}

/**
 * @param Node|null $root
 * @return void|null
 */
function postorderTraversal(?Node $root)
{
    if ($root === null) {
        return null;
    }
    postorderTraversal($root->leftChild);
    postorderTraversal($root->rightChild);
    echo $root->value . ' -> ';
}

echo "Filling a tree with values 1,2,3,4,5,6 ...\n";

$root = new Node(1);
insertLeft($root, 2);
insertRight($root, 3);
insertLeft($root->leftChild, 4);
insertRight($root->leftChild, 5);
insertLeft($root->rightChild, 6);

echo "\nVisualization of a tree:\n";
echo "
      1
   2     3
4    5   6\n
";

echo "Inorder traversal: ";
inorderTraversal($root);
echo "\n";

echo "Preorder traversal: ";
preorderTraversal($root);
echo "\n";

echo "Postorder traversal: ";
postorderTraversal($root);
echo "\n";
