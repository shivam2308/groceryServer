<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: summaryPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>SummaryPb</code>
 */
class SummaryPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 resultCount = 1;</code>
     */
    protected $resultCount = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $resultCount
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\SummaryPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 resultCount = 1;</code>
     * @return int
     */
    public function getResultCount()
    {
        return $this->resultCount;
    }

    /**
     * Generated from protobuf field <code>int32 resultCount = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setResultCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->resultCount = $var;

        return $this;
    }

}

