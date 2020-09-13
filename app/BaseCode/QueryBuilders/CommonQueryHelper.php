<?php

namespace App\BaseCode\QueryBuilders;

class CommonQueryHelper {

    public function getStringInParanthesis($data){
        return "(".$data.")";
    }

    public function getEqual(){
        return "=";
    }

    public function getStringInQuotes($data){
        return "'".$data."'";
    }

    public function getSpace(){
        return " ";
    }

    public function getAND(){
        return "AND";
    }

    public function getOR(){
        return "OR";
    }
}

?>