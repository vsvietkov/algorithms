<?php

class Node
{
    public mixed $value;
    public ?Node $leftChild  = null;
    public ?Node $rightChild = null;

    /**
     * @param mixed $value
     */
    public function __construct(mixed $value = null)
    {
        $this->value = $value;
    }
}
