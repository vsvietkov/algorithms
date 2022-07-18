<?php

class RBNode
{
    public int $value;
    public string $color;
    public ?RBNode $parent;
    public ?RBNode $leftChild;
    public ?RBNode $rightChild;

    /**
     * @param int $value
     * @param string $color
     * @param RBNode|null $parent
     * @param RBNode|null $leftChild
     * @param RBNode|null $rightChild
     */
    public function __construct(
        int $value,
        string $color     = 'red',
        ?RBNode $parent     = null,
        ?RBNode $leftChild  = null,
        ?RBNode $rightChild = null
    ) {
        $this->value      = $value;
        $this->color      = $color;
        $this->parent     = $parent;
        $this->leftChild  = $leftChild;
        $this->rightChild = $rightChild;
    }
}
