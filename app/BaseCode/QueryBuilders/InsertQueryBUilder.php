<?php

namespace App\BaseCode\QueryBuilders;

use Exception;
use App\BaseCode\QueryBuilders\IQueryBuilder;
use App\BaseCode\QueryBuilders\CommonQueryHelper;
use App\BaseCode\Strings;

class InsertQueryBuilder implements IQueryBuilder{

    Private $m_helper;
    Private $m_insertInto = "INSERT INTO";
    Private $m_valueKey = "VALUES";

    function __construct(){
        $this->m_helper = new CommonQueryHelper();
    }

    function getQuery($array ,$tableName){
        var_dump($array,$tableName);
        $query = $this->m_insertInto . " " . $tableName;
        if(empty($array) || Strings::isEmpty($tableName)){
            throw new Exception("Array is Empty Or table Missing", 1);
        }else{
            $keys = "";
            $values = "";
            foreach($array as $key => $value) {
               if(Strings::isEmpty($keys) && Strings::isEmpty($values)){
                   $keys = $key;
                   $values = $this->m_helper->getStringInQuotes($value);
               }else{
               $keys = $keys . "," . $key;
               $values = $values . "," . $this->m_helper->getStringInQuotes($value);
               }
            }
            
        }
        return $query . $this->m_helper->getSpace() . $this->m_helper->getStringInParanthesis($keys). $this->m_valueKey. $this->m_helper->getSpace() .$this->m_helper->getStringInParanthesis($values);
    }

}

?>