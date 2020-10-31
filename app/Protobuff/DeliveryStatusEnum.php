<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: buyPb.proto

namespace App\Protobuff;

use UnexpectedValueException;

/**
 * Protobuf type <code>DeliveryStatusEnum</code>
 */
class DeliveryStatusEnum
{
    /**
     * Generated from protobuf enum <code>UNKNOWN_DELIVERY_STATUS = 0;</code>
     */
    const UNKNOWN_DELIVERY_STATUS = 0;
    /**
     * Generated from protobuf enum <code>DELIVERED = 1;</code>
     */
    const DELIVERED = 1;
    /**
     * Generated from protobuf enum <code>PENDING = 2;</code>
     */
    const PENDING = 2;
    /**
     * Generated from protobuf enum <code>CLOSED = 3;</code>
     */
    const CLOSED = 3;

    private static $valueToName = [
        self::UNKNOWN_DELIVERY_STATUS => 'UNKNOWN_DELIVERY_STATUS',
        self::DELIVERED => 'DELIVERED',
        self::PENDING => 'PENDING',
        self::CLOSED => 'CLOSED',
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

