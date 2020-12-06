<?php

namespace App\BaseCode\QueryBuilders;

use App\BaseCode\JsonConvertor\JsonConvertor;
use App\Protobuff\SummaryPb;


class SearchResultHandler{

    private $m_convertor;
    private $m_respPb;

    public function __construct($convertor,$respPb){
        $this->m_convertor = $convertor;
        $this->m_respPb = $respPb;
    }

    public function handleResults($array){
        $resp = $this->m_respPb;
        $resp->setSummary(new SummaryPb());
        $resp->getSummary()->setResultCount(count($array)-1);
        $respArray = array();
        $length = sizeof($array);
        for ($i = 0; $i < $length-1; $i++) {
            array_push($respArray,$this->m_convertor->convert((array)json_decode(json_encode($array[$i],true))));
        }
        $resp->setResults($respArray);
        return $resp;
    }
}

?>
