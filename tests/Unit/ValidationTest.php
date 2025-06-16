<?php
declare(strict_types = 1);

namespace DenysK\LinkedList\Tests\Unit;

use DenysK\LinkedList\Exception\InvalidDataTypeException;
use DenysK\LinkedList\SortedLinkedList;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    /**
     * @throws InvalidDataTypeException
     */
    #[DataProvider('UnsupportedTypesDataProvider')]
    public function testUnsupportedDataType(mixed $type, string $message): void
    {
        $this->expectExceptionMessage($message);
        
        $sortedList = new SortedLinkedList();
        $sortedList->insert($type);
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testIntInvalidDataTypeForCurrentInstance(): void
    {
        $this->expectException(InvalidDataTypeException::class);
        $this->expectExceptionMessage('Invalid data type. SortedLinkedList already created with int type values.');
        
        $sortedList = new SortedLinkedList();
        $sortedList->insert(1);
        $sortedList->insert('string');
    }
    
    /**
     * @throws InvalidDataTypeException
     */
    public function testStringInvalidDataTypeForCurrentInstance(): void
    {
        $this->expectException(InvalidDataTypeException::class);
        $this->expectExceptionMessage('Invalid data type. SortedLinkedList already created with string type values.');
        
        $sortedList = new SortedLinkedList();
        $sortedList->insert('string');
        $sortedList->insert(1);
    }
    
    public static function UnsupportedTypesDataProvider(): array
    {
        return [
            [[], 'Argument #1 ($data) must be of type string|int, array given'],
            [3.5, 'Argument #1 ($data) must be of type string|int, float given'],
            [false, 'Argument #1 ($data) must be of type string|int, false given'],
        ];
    }
}
