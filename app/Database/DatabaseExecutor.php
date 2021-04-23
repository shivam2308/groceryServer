<?php

namespace App\Database;
use Exception;
use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager as Capsule;

class DatabaseExecutor{

    Private $result;

    function __construct(){
        $capsule = new Capsule;
        //$Capsule->addConnection(config::get('database'));
        /*$capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'grocerydatabase',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);*/
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'sql349.main-hosting.eu',
            'database'  => 'u570192614_amazaar_db',
            'username'  => 'u570192614_amazaar_db',
            'password'  => 'Shiv@123',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();  //this is important
        $capsule->bootEloquent();
        $capsule->setFetchMode(PDO::FETCH_ASSOC);
    }

    function executeQuery($query){
        error_log($query);
        $this->result = Capsule::select($query);
        /*if($this->result == NULL){
           throw new Exception("Query Executing having Null value", 1);
        }else{
            var_dump($this->result);
            return $this->result;
        }*/
        return $this->result;
    }

}
?>
