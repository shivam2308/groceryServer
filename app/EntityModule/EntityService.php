<?php

namespace App\EntityModule;

use App\BaseCode\OpreationModule\AGet;
use App\BaseCode\OpreationModule\AUpdate;
use App\BaseCode\IntegerToAlphaConvertor;
use App\BaseCode\OpreationModule\OpreationHelper;
use App\ServerConfig\ServerListner;


class EntityService {

    private $m_aGet;
    private $m_aUpdate;
    private $m_helper;
    private $m_integerToAlphaConvertor;
    private $m_serverListner;
    private $m_opreation;


    function __construct(){
        $this->m_aGet = new AGet();
        $this->m_aUpdate = new AUpdate();
        $this->m_helper = new EntityHelper();
        $this->m_integerToAlphaConvertor = new IntegerToAlphaConvertor();
        $this->m_serverListner = new ServerListner();
        $this->m_opreation = new OpreationHelper();
    }

    function get(){
        $entity = $this->m_aGet->getEntity($this->m_helper->getQueryArray(),$this->m_helper->getTableName());
        $value = intval($entity["DATA"]);
        $id = $this->m_integerToAlphaConvertor->toAlpha($value);
        $updateValue= strval($value +1);
        $this->m_aUpdate->updateEntity($this->m_helper->getUpdateQuery($updateValue,$this->m_opreation->getTableName($this->m_helper->getTableName(),$this->m_serverListner->getEnvironment())));
        return $id;

    }
}

?>