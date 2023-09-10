<?php

namespace Vsvietkov\DataStructures\BinarySearch;

class BSTNode
{
    public ?int $value;
    public ?BSTNode $leftChild  = null;
    public ?BSTNode $rightChild = null;

    /**
     * @param int|null $value
     */
    public function __construct(?int $value = null)
    {
        $this->value = $value;
    }
}
