<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: pushNotificationPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>PushNotificationSearchRequestPb</code>
 */
class PushNotificationSearchRequestPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string customerRefId = 1;</code>
     */
    protected $customerRefId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customerRefId
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\PushNotificationPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string customerRefId = 1;</code>
     * @return string
     */
    public function getCustomerRefId()
    {
        return $this->customerRefId;
    }

    /**
     * Generated from protobuf field <code>string customerRefId = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomerRefId($var)
    {
        GPBUtil::checkString($var, True);
        $this->customerRefId = $var;

        return $this;
    }

}

