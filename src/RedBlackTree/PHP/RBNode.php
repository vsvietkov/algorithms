<?php

namespace Vsvietkov\DataStructures\RedBlackTree;

class RBNode
{
    public int $value;
    public string $color;
    public ?RBNode $parent;
    public ?RBNode $leftChild  = null;
    public ?RBNode $rightChild = null;

    /**
     * @param int $value
     * @param string $color
     * @param RBNode|null $parent
     */
    public function __construct(
        int $value,
        string $color = 'red',
        ?RBNode $parent = null
    ) {
        $this->value      = $value;
        $this->color      = $color;
        $this->parent     = $parent;
    }
}
