<?php
declare(strict_types = 1);

namespace DenysK\LinkedList\Exception;

class InvalidDataTypeException extends \Exception
{
    public const INVALID_DATA_TYPE = 'Invalid data type. SortedLinkedList already created with %s type values.';
}
