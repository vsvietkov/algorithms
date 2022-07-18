<?php

class Node
{
    public ?int $value;
    public ?Node $leftChild  = null;
    public ?Node $rightChild = null;

    /**
     * @param int|null $value
     */
    public function __construct(?int $value = null)
    {
        $this->value = $value;
    }
}

class Tree
{
    /**
     * @param Node|null $root
     * @param int $value
     * @return Node
     */
    public function insert(?Node $root, int $value): Node
    {
        if ($root === null) {
            return new Node($value);
        }

        if ($value < $root->value) {
            $root->leftChild = $this->insert($root->leftChild, $value);
        } else {
            $root->rightChild = $this->insert($root->rightChild, $value);
        }

        return $root;
    }

    /**
     * Find the leftmost node
     *
     * @param Node|null $root
     * @return Node|null
     */
    public function minValueNode(?Node $root): ?Node
    {
        $current = $root;

        while ($current && $current->leftChild !== null) {
            $current = $current->leftChild;
        }

        return $current;
    }

    /**
     * @param Node|null $root
     * @param int $value
     * @return Node|null
     */
    public function delete(?Node $root, int $value): ?Node
    {
        if ($root === null) {
            return null;
        }

        if ($value < $root->value) {
            $root->leftChild = $this->delete($root->leftChild, $value);
        } else if ($value > $root->value) {
            $root->rightChild = $this->delete($root->rightChild, $value);
        } else {
            if ($root->leftChild === null) {
                return $root->rightChild;
            } else if ($root->rightChild === null) {
                return $root->leftChild;
            }
            $temp             = $this->minValueNode($root->rightChild);
            // Change the value of current root to the next number by magnitude
            $root->value      = $temp->value;
            $root->rightChild = $this->delete($root->rightChild, $temp->value);
        }

        return $root;
    }

    /**
     * @param Node|null $root
     * @param int $value
     * @return Node|null
     */
    public function search(?Node $root, int $value): ?Node
    {
        if (!$root) {
            return null;
        }

        if ($value === $root->value) {
            return $root;
        }

        if ($value < $root->value) {
            return $this->search($root->leftChild, $value);
        }

        if ($value > $root->value) {
            return $this->search($root->rightChild, $value);
        }

        return null;
    }
}
