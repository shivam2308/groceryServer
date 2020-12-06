<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: customerPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>CustomerSearchRequestPb</code>
 */
class CustomerSearchRequestPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 1;</code>
     */
    protected $privilege = 0;
    /**
     * Generated from protobuf field <code>string mobileNo = 2;</code>
     */
    protected $mobileNo = '';
    /**
     * Generated from protobuf field <code>string email = 3;</code>
     */
    protected $email = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $privilege
     *     @type string $mobileNo
     *     @type string $email
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\CustomerPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 1;</code>
     * @return int
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setPrivilege($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\PrivilegeTypeEnum::class);
        $this->privilege = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string mobileNo = 2;</code>
     * @return string
     */
    public function getMobileNo()
    {
        return $this->mobileNo;
    }

    /**
     * Generated from protobuf field <code>string mobileNo = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMobileNo($var)
    {
        GPBUtil::checkString($var, True);
        $this->mobileNo = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string email = 3;</code>
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Generated from protobuf field <code>string email = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;

        return $this;
    }

}

