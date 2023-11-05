<?php
declare(strict_types = 1);

namespace DenysK\LinkedList;

use DenysK\LinkedList\Exception\InvalidDataTypeException;
use ReturnTypeWillChange;

class SortedLinkedList implements \Iterator
{
    public function __construct(
        private readonly bool $ascending = true,
        private ?DataTypes $dataType = null,
        private ?Node $head = null,
        private ?Node $currentNode = null
    ) {
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function insert(int|string $data): void
    {
        $this->validateDataType($data);
        
        $newNode = Node::create($data);
        
        if ($this->head === null) {
            $this->head = $newNode;
            
            return;
        }
        
        if (($this->ascending && $this->head->getData() > $data)
            || (!$this->ascending && $this->head->getData() < $data)) {
            $newNode->setNext($this->head);
            $this->head = $newNode;
            
            return;
        }
        
        $current = $this->head;
        
        while ($current->getNext() !== null &&
            (($this->ascending && $current->getNext()->getData() < $data)
                || (!$this->ascending && $current->getNext()->getData() > $data))) {
            $current = $current->getNext();
        }
        
        $newNode->setNext($current->getNext());
        $current->setNext($newNode);
    }
    
    private function setDataType(int|string $data): void
    {
        is_int($data) ? $this->dataType = DataTypes::INT_DATA_TYPE : $this->dataType = DataTypes::STRING_DATA_TYPE;
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    private function validateDataType(int|string $data): void
    {
        if ($this->dataType === null) {
            $this->setDataType($data);
            
            return;
        }
        
        if ($this->dataType === DataTypes::INT_DATA_TYPE && !is_int($data)) {
            throw new InvalidDataTypeException(
                sprintf(InvalidDataTypeException::INVALID_DATA_TYPE, $this->dataType->name())
            );
        }
        
        if ($this->dataType === DataTypes::STRING_DATA_TYPE && !is_string($data)) {
            throw new InvalidDataTypeException(
                sprintf(InvalidDataTypeException::INVALID_DATA_TYPE, $this->dataType->name())
            );
        }
    }
    
    public function display(): void
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->getData() . " ";
            $current = $current->getNext();
        }
        
        echo "\n";
    }
    
    public function rewind(): void
    {
        $this->currentNode = $this->head;
    }
    
    #[ReturnTypeWillChange]
    public function current(): int|string
    {
        return $this->currentNode->getData();
    }
    
    #[ReturnTypeWillChange]
    public function key(): null
    {
        return null;
    }
    
    #[ReturnTypeWillChange]
    public function next(): void
    {
        $this->currentNode = $this->currentNode->getNext();
    }
    
    public function valid(): bool
    {
        return $this->currentNode !== null;
    }
}
