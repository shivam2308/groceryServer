<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: entityPb.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>EntityPb</code>
 */
class EntityPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string id = 1;</code>
     */
    protected $id = '';
    /**
     * Generated from protobuf field <code>int32 version = 2;</code>
     */
    protected $version = 0;
    /**
     * Generated from protobuf field <code>.StatusEnum lifeTime = 3;</code>
     */
    protected $lifeTime = 0;
    /**
     * Generated from protobuf field <code>.LocalePb locale = 4;</code>
     */
    protected $locale = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *     @type int $version
     *     @type int $lifeTime
     *     @type \LocalePb $locale
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\EntityPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string id = 1;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>string id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 version = 2;</code>
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Generated from protobuf field <code>int32 version = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->version = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.StatusEnum lifeTime = 3;</code>
     * @return int
     */
    public function getLifeTime()
    {
        return $this->lifeTime;
    }

    /**
     * Generated from protobuf field <code>.StatusEnum lifeTime = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setLifeTime($var)
    {
        GPBUtil::checkEnum($var, \StatusEnum::class);
        $this->lifeTime = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.LocalePb locale = 4;</code>
     * @return \LocalePb
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Generated from protobuf field <code>.LocalePb locale = 4;</code>
     * @param \LocalePb $var
     * @return $this
     */
    public function setLocale($var)
    {
        GPBUtil::checkMessage($var, \LocalePb::class);
        $this->locale = $var;

        return $this;
    }

}

