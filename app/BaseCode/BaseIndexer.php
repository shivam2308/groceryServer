<?php


namespace App\BaseCode;


use BenSampo\Enum\Enum;

class BaseIndexer extends Enum
{
    const STRING = 'STRING';
    const INT = 'INT';
    const BIG_INT = 'BIG_INT';
    const FLOAT = 'FLOAT';

    public static function get_Value_STRING()
    {
        return Enums::value(BaseIndexer::fromValue(BaseIndexer::STRING));
    }

    public static function get_Key_STRING()
    {
        return Enums::key(BaseIndexer::fromValue(BaseIndexer::STRING));
    }

    public static function get_Value_INT()
    {
        return Enums::value(BaseIndexer::fromValue(BaseIndexer::INT));
    }

    public static function get_Key_INT()
    {
        return Enums::key(BaseIndexer::fromValue(BaseIndexer::INT));
    }

    public static function get_Value_BIG_INT()
    {
        return Enums::value(BaseIndexer::fromValue(BaseIndexer::BIG_INT));
    }

    public static function get_Key_BIG_INT()
    {
        return Enums::key(BaseIndexer::fromValue(BaseIndexer::BIG_INT));
    }
    public static function get_Value_FLOAT()
    {
        return Enums::value(BaseIndexer::fromValue(BaseIndexer::BIG_INT));
    }

    public static function get_Key_FLOAT()
    {
        return Enums::key(BaseIndexer::fromValue(BaseIndexer::FLOAT));
    }
}
