<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: imagePb.proto

namespace App\Protobuff;

use UnexpectedValueException;

/**
 * Protobuf type <code>ImageExtensionTypeEnum</code>
 */
class ImageExtensionTypeEnum
{
    /**
     * Generated from protobuf enum <code>UNKNOWN_EXTENSION_TYPE = 0;</code>
     */
    const UNKNOWN_EXTENSION_TYPE = 0;
    /**
     * Generated from protobuf enum <code>JPEG_TYPE = 1;</code>
     */
    const JPEG_TYPE = 1;
    /**
     * Generated from protobuf enum <code>PNG_TYPE = 2;</code>
     */
    const PNG_TYPE = 2;

    private static $valueToName = [
        self::UNKNOWN_EXTENSION_TYPE => 'UNKNOWN_EXTENSION_TYPE',
        self::JPEG_TYPE => 'JPEG_TYPE',
        self::PNG_TYPE => 'PNG_TYPE',
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
