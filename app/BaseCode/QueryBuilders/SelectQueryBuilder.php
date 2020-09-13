<?php

namespace App\BaseCode\QueryBuilders;

use Exception;
use App\BaseCode\QueryBuilders\IQueryBuilder;
use App\BaseCode\QueryBuilders\CommonQueryHelper;

class SelectQueryBuilder implements IQueryBuilder{

    Private $m_helper;
    Private $m_select = "SELECT * FROM";
    Private $where = "WHERE";


    function __construct(){
        $this->m_helper = new CommonQueryHelper();
    }

    function getQuery($array ,$tableName){
        $query = $this->m_select.$this->m_helper->getSpace().$tableName.$this->m_helper->getSpace().$this->where.$this->m_helper->getSpace();
        $condition = "";
        foreach($array as $key => $value) {
            if($condition==""){
                $condition = $this->m_helper->getSpace() . $key . $this->m_helper->getEqual() . $this->m_helper->getStringInQuotes($value) ;
            }else{
                $condition = $condition . $this->m_helper->getSpace() . $this->m_helper->getAND() . $this->m_helper->getSpace()  . $key . $this->m_helper->getEqual() . $this->m_helper->getStringInQuotes($value) ;
            }
         }
         return $query . $this->m_helper->getSpace() . $condition ;
    }
}

?>