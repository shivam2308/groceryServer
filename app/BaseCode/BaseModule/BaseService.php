<?php

namespace App\BaseCode\BaseModule;

use Exception;
use App\Protobuff\EntityPb;
use App\BaseCode\OpreationModule\AService;
use App\BaseCode\Strings;
use App\EntityModule\EntityService;
use App\BaseCode\QueryBuilders\SearchResultHandler;


class BaseService extends AService{

    private $m_updator;
    private $m_convertor;
    private $m_searcher;
    private $m_responsePb;
    private $m_entityService;
    private $m_searchResultHandler;
    private $m_baseSearcher;

    public function __construct($updator,$convertor,$searcher,$responsePb,$tableName){
        parent::__construct($tableName);
        $this->m_updator = $updator;
        $this->m_convertor = $convertor;
        $this->m_searcher = $searcher;
        $this->m_responsePb = $responsePb;
        $this->m_entityService = new EntityService();
        $this->m_baseSearcher = new BaseSearcher();
        $this->m_searchResultHandler = new SearchResultHandler($this->m_convertor, $this->m_responsePb);
        
    }

    public function get($id){
        return $this->m_convertor->convert($this->getEntity($id));
    }
    public function create($pb){
        $id = $this->m_entityService->get();
        $pb->setDbInfo(new EntityPb());
        $pb->getDbInfo()->setId($id);
        $this->createEntity($this->m_updator->update($pb));
        return $this->get($id);

    }
    public function update($id,$pb){
        if(Strings::isEmpty($id)){
            return new Exception("id is Empty");
        }
        if(Strings::isEmpty($pb->getDbInfo()->getId())){
            return new Exception("Pb DbInfo id is Empty");
        }
        if(!Strings::notEqual($id,$pb->getDbInfo()->getId())){
            return new Exception("id and pb id are not same !!");
        }
        $this->updateEntity($id,$this->m_updator->update($pb));
        return $this->get($id);

    }
    public function search($pb){
        $resp = $this->searchEntity($this->m_searcher->search($pb));
        $searchArray = $this->m_baseSearcher->addExpression($resp);
        return $this->m_searchResultHandler->handleResults($searchArray);
    } 

}

?>