<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: orderedListPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>OrderedListPb</code>
 */
class OrderedListPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string parentOrderId = 4;</code>
     */
    protected $parentOrderId = '';
    /**
     * Generated from protobuf field <code>.TimePb time = 5;</code>
     */
    protected $time = null;
    /**
     * Generated from protobuf field <code>.PaymentPbRef paymentRef = 6;</code>
     */
    protected $paymentRef = null;
    /**
     * Generated from protobuf field <code>.DeliveryStatusEnum deliveryStatus = 7;</code>
     */
    protected $deliveryStatus = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parentOrderId
     *     @type \App\Protobuff\TimePb $time
     *     @type \App\Protobuff\PaymentPbRef $paymentRef
     *     @type int $deliveryStatus
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\OrderedListPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string parentOrderId = 4;</code>
     * @return string
     */
    public function getParentOrderId()
    {
        return $this->parentOrderId;
    }

    /**
     * Generated from protobuf field <code>string parentOrderId = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setParentOrderId($var)
    {
        GPBUtil::checkString($var, True);
        $this->parentOrderId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 5;</code>
     * @return \App\Protobuff\TimePb
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 5;</code>
     * @param \App\Protobuff\TimePb $var
     * @return $this
     */
    public function setTime($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\TimePb::class);
        $this->time = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.PaymentPbRef paymentRef = 6;</code>
     * @return \App\Protobuff\PaymentPbRef
     */
    public function getPaymentRef()
    {
        return $this->paymentRef;
    }

    /**
     * Generated from protobuf field <code>.PaymentPbRef paymentRef = 6;</code>
     * @param \App\Protobuff\PaymentPbRef $var
     * @return $this
     */
    public function setPaymentRef($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\PaymentPbRef::class);
        $this->paymentRef = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.DeliveryStatusEnum deliveryStatus = 7;</code>
     * @return int
     */
    public function getDeliveryStatus()
    {
        return $this->deliveryStatus;
    }

    /**
     * Generated from protobuf field <code>.DeliveryStatusEnum deliveryStatus = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setDeliveryStatus($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\DeliveryStatusEnum::class);
        $this->deliveryStatus = $var;

        return $this;
    }

}
