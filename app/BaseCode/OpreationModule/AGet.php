<?php

namespace App\BaseCode\OpreationModule;

use App\BaseCode\QueryBuilders\SelectQueryBuilder;
use App\Database\DatabaseExecutor;
use App\ServerConfig\ServerListner;

class AGet{

    private $m_queryBuilder;
    private $m_databaseExecutor;
    private $m_serverListner;
    private $m_helper;

    public function __construct()
    {
        $this->m_queryBuilder = new SelectQueryBuilder();
        $this->m_databaseExecutor = new DatabaseExecutor();
        $this->m_serverListner = new ServerListner();
        $this->m_helper = new OpreationHelper();
    }

    public function get($id, $tableName)
    {
        $array = array();
        if(strpos($id, "@") !== false) {
            $splitId = explode("@", $id);
            $array['id'] = $splitId[0];
            $array['DBID'] = $splitId[1];
        }else{
            $array['DBID'] = $id;
        }
        $arrayPb = $this->m_databaseExecutor->executeQuery($this->m_queryBuilder->getQuery($array, $this->m_helper->getTableName($tableName, $this->m_serverListner->getEnvironment())));
        return json_decode(json_encode($arrayPb[0]),true);
    }

    public function getEntity($array, $tableName){
        $entity =  $this->m_databaseExecutor->executeQuery($this->m_queryBuilder->getQuery($array, $this->m_helper->getTableName($tableName, $this->m_serverListner->getEnvironment())));
        return json_decode(json_encode($entity[0]),true);
    }

}
