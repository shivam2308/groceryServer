<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: entityPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>LocalePb</code>
 */
class LocalePb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.TimeZoneEnum defaultTimeZone = 1;</code>
     */
    protected $defaultTimeZone = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $defaultTimeZone
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\EntityPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.TimeZoneEnum defaultTimeZone = 1;</code>
     * @return int
     */
    public function getDefaultTimeZone()
    {
        return $this->defaultTimeZone;
    }

    /**
     * Generated from protobuf field <code>.TimeZoneEnum defaultTimeZone = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setDefaultTimeZone($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\TimeZoneEnum::class);
        $this->defaultTimeZone = $var;

        return $this;
    }

}

