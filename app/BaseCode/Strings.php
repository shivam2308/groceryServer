<?php

namespace App\BaseCode;

class Strings {

    public static function isEnpty($var) {
        $var = trim($var); 
        if(isset($var) === true && $var === '') {
            return true;
        }
        else {
            return false;
        }
    
    }

}

?>