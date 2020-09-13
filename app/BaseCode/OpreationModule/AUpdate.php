<?php

namespace App\BaseCode\OpreationModule;

use App\Database\DatabaseExecutor;
use App\BaseCode\QueryBuilders\UpdateQueryBuilder;
use App\ServerConfig\ServerListner;

class AUpdate {

    private $m_queryBuilder;
    private $m_databaseExecutor;
    private $m_serverListner;
    private $m_helper;

    function __construct(){
        $this->m_queryBuilder = new UpdateQueryBuilder();
        $this->m_databaseExecutor = new DatabaseExecutor();
        $this->m_serverListner = new ServerListner();
        $this->m_helper = new OpreationHelper();
    }

    function update($array, $id,$tableName){
        return $this->m_databaseExecutor->executeQuery($this->m_queryBuilder->getUpdateQuery($array, $id,$this->m_helper->getTableName($tableName, $this->m_serverListner->getEnvironment())));
    }

    function updateEntity($query){
        return $this->m_databaseExecutor->executeQuery($query);
    }

}

?>