<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: buyPb.proto

namespace App\GPBMetadata;

class BuyPb
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \App\GPBMetadata\EntityPb::initOnce();
        \App\GPBMetadata\SummaryPb::initOnce();
        \App\GPBMetadata\ItemPb::initOnce();
        \App\GPBMetadata\CustomerPb::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0aa6040a0b62757950622e70726f746f1a0f73756d6d61727950622e70726f746f1a0c6974656d50622e70726f746f1a10637573746f6d657250622e70726f746f22c3010a05427579506212190a066462496e666f18012001280b32092e456e746974795062120f0a076f72646572496418022001280912230a0b637573746f6d657252656618032001280b320e2e437573746f6d65725062526566121b0a076974656d52656618042001280b320a2e4974656d506252656612100a087175616e74697479180520012805120d0a057072696365180620012802122b0a0e64656c697665727953746174757318072001280e32132e44656c6976657279537461747573456e756d22360a084275795062526566120a0a026964180120012809120f0a076f726465724964180220012809120d0a05707269636518032001280222140a12427579536561726368526571756573745062224b0a13427579536561726368526573706f6e73655062121b0a0773756d6d61727918012001280b320a2e53756d6d617279506212170a07726573756c747318022003280b32062e42757950622a590a1244656c6976657279537461747573456e756d121b0a17554e4b4e4f574e5f44454c49564552595f5354415455531000120d0a0944454c4956455245441001120b0a0750454e44494e471002120a0a06434c4f53454410034222ca020d4170705c50726f746f62756666e2020f4170705c4750424d65746164617461620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

