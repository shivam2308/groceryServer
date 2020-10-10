<?php

namespace App\BaseCode\OpreationModule;

use App\Interfaces\Iservices;
use App\BaseCode\OpreationModule\AGet;
use App\BaseCode\OpreationModule\AUpdate;
use App\BaseCode\OpreationModule\ACreate;
use App\BaseCode\OpreationModule\ASearch;

class AService{

    protected $m_aGet;
    protected $m_aCreate;
    protected $m_aUpdate;
    protected $m_aSearch;
    protected $m_tableName;

    public function __construct($tableName){
        $this->m_aGet = new AGet();
        $this->m_aUpdate = new AUpdate();
        $this->m_aCreate = new ACreate();
        $this->m_aSearch = new ASearch();
        $this->m_tableName = $tableName;
    }

    public function getEntity($id){
        return $this->m_aGet->get($id,$this->m_tableName);
    }

    public function createEntity($array){
        //var_dump(($array));
        return $this->m_aCreate->create($array,$this->m_tableName);
    }

    public function updateEntity($id,$array){
        return $this->m_aUpdate->update($array,$id,$this->m_tableName);
    }

    public function searchEntity($array){
        return $this->m_aSearch->search($array, $this->m_tableName);
    }


}

?>