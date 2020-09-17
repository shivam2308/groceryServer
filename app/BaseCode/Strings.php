<?php

namespace App\BaseCode;

class Strings {

    public static function isEmpty($var) {
        $var = trim($var); 
        if(isset($var) === true && $var === '') {
            return true;
        }
        else {
            return false;
        }
    
    }

    public static function notEmpty($var) {
        return !Strings::isEmpty($var);
    }

    public static function areEqual($str1,$str2){
        return strcmp($str1,$str2);
    }
    public static function notEqual($str1,$str2){
        return !Strings::areEqual($str1,$str2);
    }


}

?>