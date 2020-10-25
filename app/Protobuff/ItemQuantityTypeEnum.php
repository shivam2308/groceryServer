<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: itemPb.proto

namespace App\Protobuff;

use UnexpectedValueException;

/**
 * Protobuf type <code>ItemQuantityTypeEnum</code>
 */
class ItemQuantityTypeEnum
{
    /**
     * Generated from protobuf enum <code>UNKNOWN_ITEM_QUANTITY_TYPE = 0;</code>
     */
    const UNKNOWN_ITEM_QUANTITY_TYPE = 0;
    /**
     * Generated from protobuf enum <code>KILO_GRAMS = 1;</code>
     */
    const KILO_GRAMS = 1;
    /**
     * Generated from protobuf enum <code>GRAMS = 2;</code>
     */
    const GRAMS = 2;
    /**
     * Generated from protobuf enum <code>PIECE = 3;</code>
     */
    const PIECE = 3;
    /**
     * Generated from protobuf enum <code>LITRE = 4;</code>
     */
    const LITRE = 4;

    private static $valueToName = [
        self::UNKNOWN_ITEM_QUANTITY_TYPE => 'UNKNOWN_ITEM_QUANTITY_TYPE',
        self::KILO_GRAMS => 'KILO_GRAMS',
        self::GRAMS => 'GRAMS',
        self::PIECE => 'PIECE',
        self::LITRE => 'LITRE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

