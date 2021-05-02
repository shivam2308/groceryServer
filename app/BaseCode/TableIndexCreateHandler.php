<?php


namespace App\BaseCode;


use App\CustomerModule\CustomerIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
use App\ImagePbModule\ImageIndexers;
use App\ItemPbModule\ItemIndexers;
use App\PaymentPbModule\PaymentIndexers;

class TableIndexCreateHandler
{
    private $dbid = "DBID";

    public function createIndexes($table, $array)
    {
        foreach ($array as $key => $value) {
            switch (Enums::key(BaseIndexer::fromKey($value))) {
                case BaseIndexer::STRING:
                    if ($this->isutf8mb4_bin($key)) {
                        $table->string($key)->collation('utf8mb4_bin')->nullable();
                    } else {
                        $table->string($key)->nullable();
                    }
                    break;
                case BaseIndexer::INT:
                    $table->integer($key);
                    break;
                case BaseIndexer::BIG_INT:
                    $table->bigInteger($key);
                    break;
                case BaseIndexer::FLOAT:
                    $table->float($key);
                    break;
            }
        }
    }

    public function isutf8mb4_bin($key)
    {
        if ($key == $this->dbid) {
            return true;
        }
        else if($key == CustomerIndexers::getCUSTOMER_REF_ID()){
            return true;
        }
        else if($key == DeliveryManIndexers::getDELIVERY_MAN_REF_ID()){
            return true;
        }
        else if($key == ItemIndexers::getITEM_REF_ID()){
            return true;
        }
        else if($key == PaymentIndexers::getPAYMENT_REF_ID()){
            return true;
        }
        else if($key == ImageIndexers::getIMAGE_ID()){
            return true;
        }
        else if($key == ImageIndexers::getID()){
            return true;
        }
        else if($key == CustomerIndexers::getCUSTOMER_REF_ID()){
            return true;
        }
        else {
            return false;
        }

    }
}
