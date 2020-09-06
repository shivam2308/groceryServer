<?php

use App\BaseCode\HttpRequestHandler\RequestHandlerHelper;

class RequestHandler implements IHandler{
    private $m_service;
    private $m_req;
    private $m_defaultPb;
    private $m_defaultSearchPb;
    private $m_requestType;
    private $m_helper;


    function __construct($service,$req,$defaultPb,$defaultSearchPb,$requestType){
        $this->m_req = $req;
        $this->m_defaultPb = $defaultPb;
        $this->m_defaultSearchPb = $defaultSearchPb;
        $this->m_requestType = $requestType;
        $this->m_service = $service;
        $this->m_helper = new RequestHandlerHelper();
    }

    public function handle(){
        switch ($m_requestType) {
            case RequestMethodEnum::GET:
                if($this->m_helper->isSearchReq($this->m_req)){
                    return $this->m_service->search(JsonConvertor::protobuff($this->m_req,$this->$m_defaultSearchPb->getDefaultPb()));   
                }else{
                    return $this->m_service->get($req);
                }
            case RequestMethodEnum::POST:
                    return $this->m_service->create(JsonConvertor::protobuff($this->m_req,$this->$m_defaultPb->getDefaultPb()));
            case RequestMethodEnum::PUT:
                $message = JsonConvertor::protobuff($this->m_req,$this->$m_defaultPb->getDefaultPb());
                return $this->m_service->update($message->getDbInfo()->getId(),$message);
            case RequestMethodEnum::UNKNOWN_METHOD:
                return new Exception("Method Could not be Unknown");
            default:
                return new Exception("Method Could not be Enpty");
        }
    }
    
}


?>