<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: registrationPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>RegistrationPb</code>
 */
class RegistrationPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.CustomerPb customer = 1;</code>
     */
    protected $customer = null;
    /**
     * Generated from protobuf field <code>.LoginPb login = 2;</code>
     */
    protected $login = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \App\Protobuff\CustomerPb $customer
     *     @type \App\Protobuff\LoginPb $login
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\RegistrationPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.CustomerPb customer = 1;</code>
     * @return \App\Protobuff\CustomerPb
     */
    public function getCustomer()
    {
        return isset($this->customer) ? $this->customer : null;
    }

    public function hasCustomer()
    {
        return isset($this->customer);
    }

    public function clearCustomer()
    {
        unset($this->customer);
    }

    /**
     * Generated from protobuf field <code>.CustomerPb customer = 1;</code>
     * @param \App\Protobuff\CustomerPb $var
     * @return $this
     */
    public function setCustomer($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\CustomerPb::class);
        $this->customer = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.LoginPb login = 2;</code>
     * @return \App\Protobuff\LoginPb
     */
    public function getLogin()
    {
        return isset($this->login) ? $this->login : null;
    }

    public function hasLogin()
    {
        return isset($this->login);
    }

    public function clearLogin()
    {
        unset($this->login);
    }

    /**
     * Generated from protobuf field <code>.LoginPb login = 2;</code>
     * @param \App\Protobuff\LoginPb $var
     * @return $this
     */
    public function setLogin($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\LoginPb::class);
        $this->login = $var;

        return $this;
    }

}

