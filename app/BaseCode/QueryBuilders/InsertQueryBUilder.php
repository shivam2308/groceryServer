<?php


class InsertQueryBuilder implements IQueryBuilder{

    Private $m_helper;
    Private $m_insertInto = "INSERT INTO";
    Private $m_valueKey = "VALUES";

    function __construct(){
        $this->m_helper = new CommonQueryHelper();
    }

    function getQuery($array ,$tableName){
        $query = $this->m_insertInto + " " + $tableName;
        if(!empty($array) || !empty($tableName)){
            throw new Exception("Aray is Empty Or table Missing", 1);
        }else{
            $keys = "";
            $values = "";
            foreach($array as $key => $value) {
               $keys = $keys + "," + $key;
               $values = $values + "," + $value;
            }
            
        }

        return $query + $this->m_helper->getSpace() + $this->m_helper->getStringInParanthesis($keys)+ $this->m_valueKey+ $this->m_helper->getSpace() +$this->m_helper->getStringInParanthesis($values);
    }

}

?>