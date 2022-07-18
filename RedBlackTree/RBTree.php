<?php require_once 'RBNode.php';

class RBTree
{
    public ?RBNode $root                        = null;
    public string $linkToTheToolToVisualizeTree = 'https://www.cs.usfca.edu/~galles/visualization/BST.html';

//    /**
//     * @param RBNode|null $root
//     * @param int $value
//     * @return RBNode|null
//     */
//    public function insert(?RBNode $root, int $value): ?RBNode
//    {
//        if (!$root) {
//            $this->root = new RBNode($value, 'black');
//            return $this->root;
//        }
//        $parentNode  = $root;
//        $currentNode = $root;
//
//        while ($currentNode !== null) {
//            $parentNode = $currentNode;
//
//            if ($value < $currentNode->value) {
//                $currentNode = $currentNode->leftChild;
//            } else {
//                $currentNode = $currentNode->rightChild;
//            }
//        }
//        $newNode = new RBNode($value, $parentNode->color === 'red' ? 'black' : 'red', $parentNode);
//
//        if ($value < $parentNode->value) {
//            $parentNode->leftChild = $newNode;
//        } else {
//            $parentNode->rightChild = $newNode;
//        }
//
//        return $newNode;
//    }

    /**
     * @param RBNode|null $root
     * @param int $value
     * @param RBNode|null $parent
     * @return RBNode|null
     */
    public function insert(
        ?RBNode $root,
        int $value,
        ?RBNode $parent = null
    ): ?RBNode {
        if ($root === null) {
            return new RBNode($value, !$parent || $parent->color === 'red' ? 'black' : 'red', $parent);
        }

        if ($value < $root->value) {
            $root->leftChild = $this->insert($root->leftChild, $value, $root);
        } else {
            $root->rightChild = $this->insert($root->rightChild, $value, $root);
        }

        return $root;
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
