<?php

namespace App\BaseCode\QueryBuilders;

use Exception;
use App\BaseCode\QueryBuilders\IQueryBuilder;
use App\BaseCode\QueryBuilders\CommonQueryHelper;

class UpdateQueryBuilder{

    Private $m_helper;
    Private $m_update = "UPDATE";
    Private $m_where = "WHERE";
    private $m_Set = "SET";


    function __construct(){
        $this->m_helper = new CommonQueryHelper();
    }

    function getUpdateQuery($array, $id ,$tableName){
        $query = $this->m_update . $this->m_helper->getSpace(). $tableName . $this->m_helper->getSpace() . $this->m_Set . $this->m_helper->getSpace();
        $condition = "";
        $values = "";
        if(empty($array) || empty($tableName) || empty($id)){
            throw new Exception("Array is Empty Or table Missing", 1);
        }else{
            foreach($array as $key => $value) {
               $values = $this->m_helper->getSpace() . $key . $this->m_helper->getEqual() . $this->m_helper->getStringInQuotes($value) ;
            }
            $condition = "DBID" .$this->m_helper->getSpace() . $this->m_helper->getEqual() .  $this->m_helper->getStringInQuotes($id) ;
        }
        return $query . $values . $this->m_helper->getSpace() .$this->m_where . $this->m_helper->getSpace() . $condition ;
    }
}

?>