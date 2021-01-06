<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: paymentPb.proto

namespace App\Protobuff;

use UnexpectedValueException;

/**
 * Protobuf type <code>PaymentStatusEnum</code>
 */
class PaymentStatusEnum
{
    /**
     * Generated from protobuf enum <code>UNKNOWN_PAYMENT_STATUS = 0;</code>
     */
    const UNKNOWN_PAYMENT_STATUS = 0;
    /**
     * Generated from protobuf enum <code>SUCCESS = 1;</code>
     */
    const SUCCESS = 1;
    /**
     * Generated from protobuf enum <code>FAILURE = 2;</code>
     */
    const FAILURE = 2;
    /**
     * Generated from protobuf enum <code>SUBMITTED = 3;</code>
     */
    const SUBMITTED = 3;

    private static $valueToName = [
        self::UNKNOWN_PAYMENT_STATUS => 'UNKNOWN_PAYMENT_STATUS',
        self::SUCCESS => 'SUCCESS',
        self::FAILURE => 'FAILURE',
        self::SUBMITTED => 'SUBMITTED',
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

