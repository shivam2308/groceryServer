<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: customerPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>CustomerPb</code>
 */
class CustomerPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.EntityPb dbInfo = 1;</code>
     */
    protected $dbInfo = null;
    /**
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 2;</code>
     */
    protected $privilege = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \App\Protobuff\EntityPb $dbInfo
     *     @type int $privilege
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\CustomerPb::initOnce();
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
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 2;</code>
     * @return int
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * Generated from protobuf field <code>.PrivilegeTypeEnum privilege = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setPrivilege($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\PrivilegeTypeEnum::class);
        $this->privilege = $var;

        return $this;
    }

}

