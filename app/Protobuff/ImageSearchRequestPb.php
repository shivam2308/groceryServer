<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: imagePb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ImageSearchRequestPb</code>
 */
class ImageSearchRequestPb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string imageId = 1;</code>
     */
    protected $imageId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $imageId
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\ImagePb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string imageId = 1;</code>
     * @return string
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Generated from protobuf field <code>string imageId = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setImageId($var)
    {
        GPBUtil::checkString($var, True);
        $this->imageId = $var;

        return $this;
    }

}

