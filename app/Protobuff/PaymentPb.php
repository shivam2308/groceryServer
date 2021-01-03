<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: paymentPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>PaymentPb</code>
 */
class PaymentPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.EntityPb dbInfo = 1;</code>
     */
    protected $dbInfo = null;
    /**
     * Generated from protobuf field <code>string txnId = 2;</code>
     */
    protected $txnId = '';
    /**
     * Generated from protobuf field <code>string responseCode = 3;</code>
     */
    protected $responseCode = '';
    /**
     * Generated from protobuf field <code>.PaymentStatusEnum status = 4;</code>
     */
    protected $status = 0;
    /**
     * Generated from protobuf field <code>string txnRef = 5;</code>
     */
    protected $txnRef = '';
    /**
     * Generated from protobuf field <code>.CustomerPbRef customerRef = 6;</code>
     */
    protected $customerRef = null;
    /**
     * Generated from protobuf field <code>.PaymentModeEnum mode = 7;</code>
     */
    protected $mode = 0;
    /**
     * Generated from protobuf field <code>float amount = 8;</code>
     */
    protected $amount = 0.0;
    /**
     * Generated from protobuf field <code>.TimePb time = 9;</code>
     */
    protected $time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \App\Protobuff\EntityPb $dbInfo
     *     @type string $txnId
     *     @type string $responseCode
     *     @type int $status
     *     @type string $txnRef
     *     @type \App\Protobuff\CustomerPbRef $customerRef
     *     @type int $mode
     *     @type float $amount
     *     @type \App\Protobuff\TimePb $time
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\PaymentPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.EntityPb dbInfo = 1;</code>
     * @return \App\Protobuff\EntityPb
     */
    public function getDbInfo()
    {
        return $this->dbInfo;
    }

    /**
     * Generated from protobuf field <code>.EntityPb dbInfo = 1;</code>
     * @param \App\Protobuff\EntityPb $var
     * @return $this
     */
    public function setDbInfo($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\EntityPb::class);
        $this->dbInfo = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string txnId = 2;</code>
     * @return string
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * Generated from protobuf field <code>string txnId = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTxnId($var)
    {
        GPBUtil::checkString($var, True);
        $this->txnId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string responseCode = 3;</code>
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Generated from protobuf field <code>string responseCode = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setResponseCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->responseCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.PaymentStatusEnum status = 4;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Generated from protobuf field <code>.PaymentStatusEnum status = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\PaymentStatusEnum::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string txnRef = 5;</code>
     * @return string
     */
    public function getTxnRef()
    {
        return $this->txnRef;
    }

    /**
     * Generated from protobuf field <code>string txnRef = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setTxnRef($var)
    {
        GPBUtil::checkString($var, True);
        $this->txnRef = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.CustomerPbRef customerRef = 6;</code>
     * @return \App\Protobuff\CustomerPbRef
     */
    public function getCustomerRef()
    {
        return $this->customerRef;
    }

    /**
     * Generated from protobuf field <code>.CustomerPbRef customerRef = 6;</code>
     * @param \App\Protobuff\CustomerPbRef $var
     * @return $this
     */
    public function setCustomerRef($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\CustomerPbRef::class);
        $this->customerRef = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.PaymentModeEnum mode = 7;</code>
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Generated from protobuf field <code>.PaymentModeEnum mode = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setMode($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\PaymentModeEnum::class);
        $this->mode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>float amount = 8;</code>
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Generated from protobuf field <code>float amount = 8;</code>
     * @param float $var
     * @return $this
     */
    public function setAmount($var)
    {
        GPBUtil::checkFloat($var);
        $this->amount = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 9;</code>
     * @return \App\Protobuff\TimePb
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 9;</code>
     * @param \App\Protobuff\TimePb $var
     * @return $this
     */
    public function setTime($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\TimePb::class);
        $this->time = $var;

        return $this;
    }

}

