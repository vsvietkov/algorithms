<?php

use Vsvietkov\DataStructures\Stack\Stack;

// Testing Stack - Reverse a work
$word = readline('Enter a word to be reversed: ');
echo "You entered $word\n";
$stack = new Stack(strlen($word));

foreach (str_split($word) as $letter) {
    $stack->push($letter);
}
$reversedWord = '';

while (!$stack->isEmpty()) {
    $reversedWord .= $stack->pop();
}
echo "Reversed word: $reversedWord\n";
