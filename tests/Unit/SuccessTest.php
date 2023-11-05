<?php
declare(strict_types = 1);

namespace DenysK\LinkedList\Tests\Unit;

use DenysK\LinkedList\Exception\InvalidDataTypeException;
use DenysK\LinkedList\SortedLinkedList;
use PHPUnit\Framework\TestCase;

class SuccessTest extends TestCase
{
    /**
     * @throws InvalidDataTypeException
     */
    public function testSuccessIntAscOrder(): void
    {
        $sortedList = new SortedLinkedList();
        $sortedList->insert(5);
        $sortedList->insert(2);
        $sortedList->insert(8);
        $sortedList->insert(1);
        $sortedList->insert(3);
        $sortedList->insert(7);
        $sortedList->display();
        
        $this->expectOutputString("1 2 3 5 7 8 \n");
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testSuccessStringAscOrder(): void
    {
        $sortedList = new SortedLinkedList();
        $sortedList->insert('b');
        $sortedList->insert('a');
        $sortedList->insert('c');
        $sortedList->display();
        
        $this->expectOutputString("a b c \n");
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testSuccessDescOrder(): void
    {
        $sortedList = new SortedLinkedList(false);
        $sortedList->insert(5);
        $sortedList->insert(2);
        $sortedList->insert(8);
        $sortedList->insert(1);
        $sortedList->insert(3);
        $sortedList->insert(7);
        $sortedList->display();
        
        $this->expectOutputString("8 7 5 3 2 1 \n");
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testSuccessStringDescOrder(): void
    {
        $sortedList = new SortedLinkedList(false);
        $sortedList->insert('b');
        $sortedList->insert('a');
        $sortedList->insert('c');
        $sortedList->display();
        
        $this->expectOutputString("c b a \n");
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testIterator()
    {
        $sortedList = new SortedLinkedList();
        $sortedList->insert(5);
        $sortedList->insert(2);
        $sortedList->insert(8);
        
        $expectedValues = [2, 5, 8];
        $actualValues = [];
        
        foreach ($sortedList as $value) {
            $actualValues[] = $value;
        }
        
        $this->assertEquals($expectedValues, $actualValues);
    }
}
