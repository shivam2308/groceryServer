<?php

namespace App\BaseCode\JsonConvertor;



use PHPUnit\Exception;

class JsonConvertor
{

    public static function json($pb)
    {
        return $pb->serializeToJsonString();
    }

    public static function protobuff($json, $pb)
    {
        try {
            $pb->mergeFromJsonString($json, true);
            return $pb;
        } catch (Exception $ex) {
            die('problem in converting Json to Pb ' . $ex->getMessage());
        }
    }
}
