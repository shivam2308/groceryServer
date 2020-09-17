<?php

namespace App\BaseCode\HttpRequestHandler;

use Exception;
use App\BaseCode\HttpRequestHandler\RequestHandlerHelper;
use App\Protobuff\RequestMethodEnum;
use App\BaseCode\JsonConvertor\JsonConvertor;

class RequestHandler{
    private $m_service;
    private $m_defaultPb;
    private $m_defaultSearchPb;
    private $m_helper;


    function __construct($service,$defaultPb,$defaultSearchPb){
        $this->m_defaultPb = $defaultPb;
        $this->m_defaultSearchPb = $defaultSearchPb;
        $this->m_service = $service;
        $this->m_helper = new RequestHandlerHelper();
    }

    public function handle($req,$requestType){
        switch ($requestType) {
            case RequestMethodEnum::GET:
                if($this->m_helper->isSearchReq($req)){
                    $dpb = $this->m_defaultSearchPb->getDefaultPb();
                    $pb = JsonConvertor::protobuff($req,$dpb);
                    return JsonConvertor::json($this->m_service->search($pb));   
                }else{
                    return JsonConvertor::json($this->m_service->get($req));
                }
            case RequestMethodEnum::POST:
                    return $this->m_service->create(JsonConvertor::protobuff($req,$this->m_defaultPb->getDefaultPb()));
            case RequestMethodEnum::PUT:
                $message = JsonConvertor::protobuff($req,$this->$m_defaultPb->getDefaultPb());
                return $this->m_service->update($message->getDbInfo()->getId(),$message);
            case RequestMethodEnum::UNKNOWN_METHOD:
            default:
                return new Exception("Method Could not be Unknown");
        }
    }
    
}


?>