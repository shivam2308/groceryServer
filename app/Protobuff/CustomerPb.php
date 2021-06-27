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
     * Generated from protobuf field <code>.NamePb name = 3;</code>
     */
    protected $name = null;
    /**
     * Generated from protobuf field <code>.AddressPb address = 4;</code>
     */
    protected $address = null;
    /**
     * Generated from protobuf field <code>.ContactDetailPb contact = 5;</code>
     */
    protected $contact = null;
    /**
     * Generated from protobuf field <code>.GenderEnum gender = 6;</code>
     */
    protected $gender = 0;
    /**
     * Generated from protobuf field <code>.ImageRefPb profileImage = 7;</code>
     */
    protected $profileImage = null;
    /**
     * Generated from protobuf field <code>.TimePb time = 8;</code>
     */
    protected $time = null;
    /**
     * Generated from protobuf field <code>.BooleanEnum isNotifyOn = 9;</code>
     */
    protected $isNotifyOn = 0;
    /**
     * Generated from protobuf field <code>string adharNo = 10;</code>
     */
    protected $adharNo = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \App\Protobuff\EntityPb $dbInfo
     *     @type int $privilege
     *     @type \App\Protobuff\NamePb $name
     *     @type \App\Protobuff\AddressPb $address
     *     @type \App\Protobuff\ContactDetailPb $contact
     *     @type int $gender
     *     @type \App\Protobuff\ImageRefPb $profileImage
     *     @type \App\Protobuff\TimePb $time
     *     @type int $isNotifyOn
     *     @type string $adharNo
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
        return isset($this->dbInfo) ? $this->dbInfo : null;
    }

    public function hasDbInfo()
    {
        return isset($this->dbInfo);
    }

    public function clearDbInfo()
    {
        unset($this->dbInfo);
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

    /**
     * Generated from protobuf field <code>.NamePb name = 3;</code>
     * @return \App\Protobuff\NamePb
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : null;
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * Generated from protobuf field <code>.NamePb name = 3;</code>
     * @param \App\Protobuff\NamePb $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\NamePb::class);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.AddressPb address = 4;</code>
     * @return \App\Protobuff\AddressPb
     */
    public function getAddress()
    {
        return isset($this->address) ? $this->address : null;
    }

    public function hasAddress()
    {
        return isset($this->address);
    }

    public function clearAddress()
    {
        unset($this->address);
    }

    /**
     * Generated from protobuf field <code>.AddressPb address = 4;</code>
     * @param \App\Protobuff\AddressPb $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\AddressPb::class);
        $this->address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ContactDetailPb contact = 5;</code>
     * @return \App\Protobuff\ContactDetailPb
     */
    public function getContact()
    {
        return isset($this->contact) ? $this->contact : null;
    }

    public function hasContact()
    {
        return isset($this->contact);
    }

    public function clearContact()
    {
        unset($this->contact);
    }

    /**
     * Generated from protobuf field <code>.ContactDetailPb contact = 5;</code>
     * @param \App\Protobuff\ContactDetailPb $var
     * @return $this
     */
    public function setContact($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\ContactDetailPb::class);
        $this->contact = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.GenderEnum gender = 6;</code>
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Generated from protobuf field <code>.GenderEnum gender = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setGender($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\GenderEnum::class);
        $this->gender = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.ImageRefPb profileImage = 7;</code>
     * @return \App\Protobuff\ImageRefPb
     */
    public function getProfileImage()
    {
        return isset($this->profileImage) ? $this->profileImage : null;
    }

    public function hasProfileImage()
    {
        return isset($this->profileImage);
    }

    public function clearProfileImage()
    {
        unset($this->profileImage);
    }

    /**
     * Generated from protobuf field <code>.ImageRefPb profileImage = 7;</code>
     * @param \App\Protobuff\ImageRefPb $var
     * @return $this
     */
    public function setProfileImage($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\ImageRefPb::class);
        $this->profileImage = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 8;</code>
     * @return \App\Protobuff\TimePb
     */
    public function getTime()
    {
        return isset($this->time) ? $this->time : null;
    }

    public function hasTime()
    {
        return isset($this->time);
    }

    public function clearTime()
    {
        unset($this->time);
    }

    /**
     * Generated from protobuf field <code>.TimePb time = 8;</code>
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
     * Generated from protobuf field <code>.BooleanEnum isNotifyOn = 9;</code>
     * @return int
     */
    public function getIsNotifyOn()
    {
        return $this->isNotifyOn;
    }

    /**
     * Generated from protobuf field <code>.BooleanEnum isNotifyOn = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setIsNotifyOn($var)
    {
        GPBUtil::checkEnum($var, \App\Protobuff\BooleanEnum::class);
        $this->isNotifyOn = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string adharNo = 10;</code>
     * @return string
     */
    public function getAdharNo()
    {
        return $this->adharNo;
    }

    /**
     * Generated from protobuf field <code>string adharNo = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setAdharNo($var)
    {
        GPBUtil::checkString($var, True);
        $this->adharNo = $var;

        return $this;
    }

}

