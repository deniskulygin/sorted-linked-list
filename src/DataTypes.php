<?php
declare(strict_types = 1);

namespace DenysK\LinkedList;

enum DataTypes: int
{
    case INT_DATA_TYPE = 0;
    case STRING_DATA_TYPE = 1;
    
    public function name(): string
    {
        return match($this)
        {
            self::INT_DATA_TYPE => 'int',
            self::STRING_DATA_TYPE => 'string',
        };
    }
}
