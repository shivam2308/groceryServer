<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: deliveryManPb.proto

namespace App\GPBMetadata;

class DeliveryManPb
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \App\GPBMetadata\EntityPb::initOnce();
        \App\GPBMetadata\SummaryPb::initOnce();
        \App\GPBMetadata\NamePb::initOnce();
        \App\GPBMetadata\ContactDetailPb::initOnce();
        \App\GPBMetadata\ImagePb::initOnce();
        \App\GPBMetadata\TimePb::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0abe030a1364656c69766572794d616e50622e70726f746f1a0f73756d6d61727950622e70726f746f1a0c6e616d6550622e70726f746f1a15636f6e7461637444657461696c50622e70726f746f1a0d696d61676550622e70726f746f1a0c74696d6550622e70726f746f22ac010a0d44656c69766572794d616e506212190a066462496e666f18012001280b32092e456e74697479506212150a046e616d6518022001280b32072e4e616d65506212210a07636f6e7461637418032001280b32102e436f6e7461637444657461696c5062121e0a0c70726f66696c65496d61676518042001280b32082e496d6167655062120f0a0761646861724e6f18052001280912150a0474696d6518062001280b32072e54696d655062221c0a1a44656c69766572794d616e536561726368526571756573745062225b0a1b44656c69766572794d616e536561726368526573706f6e73655062121b0a0773756d6d61727918012001280b320a2e53756d6d6172795062121f0a07726573756c747318022003280b320e2e44656c69766572794d616e50624222ca020d4170705c50726f746f62756666e2020f4170705c4750424d65746164617461620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

