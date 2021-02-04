<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: buyPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OrderdeliveryPb</code>
 */
class OrderdeliveryPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string date = 1;</code>
     */
    protected $date = '';
    /**
     * Generated from protobuf field <code>string month = 2;</code>
     */
    protected $month = '';
    /**
     * Generated from protobuf field <code>string year = 3;</code>
     */
    protected $year = '';
    /**
     * Generated from protobuf field <code>int64 milliseconds = 4;</code>
     */
    protected $milliseconds = 0;
    /**
     * Generated from protobuf field <code>string formattedDate = 5;</code>
     */
    protected $formattedDate = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $date
     *     @type string $month
     *     @type string $year
     *     @type int|string $milliseconds
     *     @type string $formattedDate
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\BuyPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string date = 1;</code>
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Generated from protobuf field <code>string date = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->date = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string month = 2;</code>
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Generated from protobuf field <code>string month = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMonth($var)
    {
        GPBUtil::checkString($var, True);
        $this->month = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string year = 3;</code>
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Generated from protobuf field <code>string year = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setYear($var)
    {
        GPBUtil::checkString($var, True);
        $this->year = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 milliseconds = 4;</code>
     * @return int|string
     */
    public function getMilliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * Generated from protobuf field <code>int64 milliseconds = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMilliseconds($var)
    {
        GPBUtil::checkInt64($var);
        $this->milliseconds = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string formattedDate = 5;</code>
     * @return string
     */
    public function getFormattedDate()
    {
        return $this->formattedDate;
    }

    /**
     * Generated from protobuf field <code>string formattedDate = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setFormattedDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->formattedDate = $var;

        return $this;
    }

}

