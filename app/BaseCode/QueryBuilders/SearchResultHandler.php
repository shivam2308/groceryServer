<?php

namespace App\BaseCode\QueryBuilders;

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
        $resp->getSummary()->setResultCount(count($array));
        $respArray = array();
        foreach ($array as $objPb) {
            array_push($respArray,$this->m_convertor->convert(json_decode(json_encode($objPb),true)));
        }
        $resp->setResults($respArray);
        return $resp;
    }
}

?>