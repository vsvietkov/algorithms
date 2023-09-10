<?php

namespace Vsvietkov\DataStructures\RedBlackTree;

use Vsvietkov\DataStructures\RedBlackTree\RBNode;

class RBTree
{
    public ?RBNode $root                        = null;
    public string $linkToTheToolToVisualizeTree = 'https://www.cs.usfca.edu/~galles/visualization/BST.html';

    /**
     * @param RBNode $x
     */
    private function leftRotate(RBNode $x)
    {
        $y             = $x->rightChild;
        $x->rightChild = $y->leftChild;

        if ($x->rightChild) {
            $x->rightChild->parent = $x;
        }
        $y->leftChild = $x;
        $y->parent    = $x->parent;
        $x->parent    = $y;

        if (!$y->parent) {
            $this->root = $y;
        } elseif ($y->parent->leftChild === $x) {
            $y->parent->leftChild = $y;
        } else {
            $y->parent->rightChild = $y;
        }
    }

    /**
     * @param RBNode $y
     */
    private function rightRotate(RBNode $y)
    {
        $x            = $y->leftChild;
        $y->leftChild = $x->rightChild;

        if ($y->leftChild) {
            $y->leftChild->parent = $y;
        }
        $x->rightChild = $y;
        $x->parent     = $y->parent;
        $y->parent     = $x;

        if (!$x->parent) {
            $this->root = $x;
        } elseif ($x->parent->leftChild === $y) {
            $x->parent->leftChild = $x;
        } else {
            $x->parent->rightChild = $x;
        }
    }

    /**
     * @param int $value
     */
    public function insert(int $value)
    {
        if (!$this->root) {
            $this->root = new RBNode($value, 'black');
            return;
        }
        $parentNode  = $this->root;
        $currentNode = $this->root;

        while ($currentNode !== null) {
            $parentNode = $currentNode;

            if ($value < $currentNode->value) {
                $currentNode = $currentNode->leftChild;
            } else {
                $currentNode = $currentNode->rightChild;
            }
        }
        $newNode = new RBNode($value, 'red', $parentNode);

        if ($value < $parentNode->value) {
            $parentNode->leftChild = $newNode;
        } else {
            $parentNode->rightChild = $newNode;
        }
        $this->fixAfterInsert($newNode);
    }

    private function fixAfterInsert(RBNode $newNode)
    {
        while ($newNode->parent && $newNode->parent->color === 'red') {
            if ($newNode->parent === $newNode->parent->parent->leftChild) {
                $y = $newNode->parent->parent->rightChild;

                if ($y && $y->color === 'red') {
                    $newNode->parent->color         = 'black';
                    $y->color                       = 'black';
                    $newNode->parent->parent->color = 'red';
                    $newNode                        = $newNode->parent->parent;
                } else {
                    if ($newNode === $newNode->parent->rightChild) {
                        $newNode = $newNode->parent;
                        $this->leftRotate($newNode);
                    }
                    $newNode->parent->color         = 'black';
                    $newNode->parent->parent->color = 'red';
                    $this->rightRotate($newNode->parent->parent);
                }
            } else {
                // The same as above, but left and right are replaced
                $y = $newNode->parent->parent->leftChild;

                if ($y && $y->color === 'red') {
                    $newNode->parent->color         = 'black';
                    $y->color                       = 'black';
                    $newNode->parent->parent->color = 'red';
                    $newNode                        = $newNode->parent->parent;
                } else {
                    if ($newNode === $newNode->parent->leftChild) {
                        $newNode = $newNode->parent;
                        $this->rightRotate($newNode);
                    }
                    $newNode->parent->color         = 'black';
                    $newNode->parent->parent->color = 'red';
                    $this->leftRotate($newNode->parent->parent);
                }
            }
        }
        $this->root->color = 'black';
    }

    /**
     * @param RBNode|null $root
     */
    private function preorderTraversal(?RBNode $root)
    {
        if ($root === null) {
            return;
        }
        echo "$root->value ($root->color), ";

        $this->preorderTraversal($root->leftChild);
        $this->preorderTraversal($root->rightChild);
    }

    /**
     * Print the content of tree using preorder traversal
     *
     * @return void|null
     */
    public function printContent()
    {
        $this->preorderTraversal($this->root);
        echo "\n";
        echo "To visualize a tree visit " . $this->linkToTheToolToVisualizeTree . "\n";
    }
}
