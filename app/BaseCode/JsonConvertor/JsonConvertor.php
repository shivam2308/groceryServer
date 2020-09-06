<?php

class JsonConvertor{


    public static function json($pb) {
        return $pb->serializeToString();
    }

    public static function protobuff($json,$pb) {
        try {
            return $pb->parseFromString($json);
        } catch (Exception $ex) {
            die('problem in converting Json to Pb ' . $ex->getMessage());
        }
    }

}

?>