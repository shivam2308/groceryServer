<?php

namespace APP\BaseCode\OpreationModule;

use App\BaseCode\QueryBuilders\InsertQueryBuilder;
use App\Database\DatabaseExecutor;
use App\ServerConfig\ServerListner;

class ACreate
{

    private $m_queryBuilder;
    private $m_databaseExecutor;
    private $m_serverListner;
    private $m_helper;

    public function __construct()
    {
        $this->m_queryBuilder = new InsertQueryBuilder();
        $this->m_databaseExecutor = new DatabaseExecutor();
        $this->m_serverListner = new ServerListner();
        $this->m_helper = new OpreationHelper();
    }

    public function create($array, $tableName)
    {
        return $this->m_databaseExecutor->executeQuery($this->m_queryBuilder->getQuery($array, $this->m_helper->getTableName($tableName, $this->m_serverListner->getEnvironment())));
    }

}
