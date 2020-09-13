<?php

namespace App\EntityModule;

class EntityHelper {

    function getQueryArray(){
        $array = array();
        $array['id'] = 1;
        return $array;
    }

    function getTableName(){
        return "ENTITY";
    }

    function getUpdateQuery($value, $tableName){
        return "UPDATE ". $tableName . " SET " . " DATA = " . $value." ;";
    }

}

?>