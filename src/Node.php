<?php
declare(strict_types = 1);

namespace DenysK\LinkedList;

class Node
{
    public function __construct(private readonly int|string $data, private ?Node $next = null)
    {
    }
    
    public static function create(int|string $data, ?Node $next = null): self
    {
        return new self($data, $next);
    }
    
    public function setNext(?Node $node): void
    {
        $this->next = $node;
    }
    
    public function getData(): int|string
    {
        return $this->data;
    }
    
    public function getNext(): ?Node
    {
        return $this->next;
    }
}
