<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: entityPb.proto

/**
 * Protobuf type <code>StatusEnum</code>
 */
class StatusEnum
{
    /**
     * Generated from protobuf enum <code>UNKNOWN_STATUS = 0;</code>
     */
    const UNKNOWN_STATUS = 0;
    /**
     * Generated from protobuf enum <code>ACTIVE = 1;</code>
     */
    const ACTIVE = 1;
    /**
     * Generated from protobuf enum <code>DELETED = 2;</code>
     */
    const DELETED = 2;
    /**
     * Generated from protobuf enum <code>SUSPUNDED = 3;</code>
     */
    const SUSPUNDED = 3;
    /**
     * Generated from protobuf enum <code>BLOCKED = 4;</code>
     */
    const BLOCKED = 4;

    private static $valueToName = [
        self::UNKNOWN_STATUS => 'UNKNOWN_STATUS',
        self::ACTIVE => 'ACTIVE',
        self::DELETED => 'DELETED',
        self::SUSPUNDED => 'SUSPUNDED',
        self::BLOCKED => 'BLOCKED',
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

