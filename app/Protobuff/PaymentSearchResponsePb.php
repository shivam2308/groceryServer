<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: paymentPb.proto

namespace App\Protobuff;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>PaymentSearchResponsePb</code>
 */
class PaymentSearchResponsePb extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.SummaryPb summary = 1;</code>
     */
    protected $summary = null;
    /**
     * Generated from protobuf field <code>repeated .PaymentPb results = 2;</code>
     */
    private $results;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \App\Protobuff\SummaryPb $summary
     *     @type \App\Protobuff\PaymentPb[]|\Google\Protobuf\Internal\RepeatedField $results
     * }
     */
    public function __construct($data = NULL) {
        \App\GPBMetadata\PaymentPb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.SummaryPb summary = 1;</code>
     * @return \App\Protobuff\SummaryPb
     */
    public function getSummary()
    {
        return isset($this->summary) ? $this->summary : null;
    }

    public function hasSummary()
    {
        return isset($this->summary);
    }

    public function clearSummary()
    {
        unset($this->summary);
    }

    /**
     * Generated from protobuf field <code>.SummaryPb summary = 1;</code>
     * @param \App\Protobuff\SummaryPb $var
     * @return $this
     */
    public function setSummary($var)
    {
        GPBUtil::checkMessage($var, \App\Protobuff\SummaryPb::class);
        $this->summary = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .PaymentPb results = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Generated from protobuf field <code>repeated .PaymentPb results = 2;</code>
     * @param \App\Protobuff\PaymentPb[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \App\Protobuff\PaymentPb::class);
        $this->results = $arr;

        return $this;
    }

}

