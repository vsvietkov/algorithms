<?php require_once 'BSTNode.php';

class Tree
{
    /**
     * @param BSTNode|null $root
     * @param int $value
     * @return BSTNode
     */
    public function insert(?BSTNode $root, int $value): BSTNode
    {
        if ($root === null) {
            return new BSTNode($value);
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
     * @param BSTNode|null $root
     * @return BSTNode|null
     */
    public function minValueNode(?BSTNode $root): ?BSTNode
    {
        $current = $root;

        while ($current && $current->leftChild !== null) {
            $current = $current->leftChild;
        }

        return $current;
    }

    /**
     * @param BSTNode|null $root
     * @param int $value
     * @return BSTNode|null
     */
    public function delete(?BSTNode $root, int $value): ?BSTNode
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
     * @param BSTNode|null $root
     * @param int $value
     * @return BSTNode|null
     */
    public function search(?BSTNode $root, int $value): ?BSTNode
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
