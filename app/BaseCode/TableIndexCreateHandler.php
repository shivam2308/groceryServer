<?php


namespace App\BaseCode;


use App\Interfaces\IHandler;

class TableIndexCreateHandler
{
    public function createIndexes($table,$array){
        foreach ($array as $key => $value){
            switch (Enums::key(BaseIndexer::fromKey($key))){
                case BaseIndexer::STRING:
                    $table->string($value)->nullable();
                    break;
                case BaseIndexer::INT:
                    $table->integer($value);
                    break;
                case BaseIndexer::BIG_INT:
                    $table->bigInteger($value);
                    break;
                case BaseIndexer::FLOAT:
                    $table->float($value);
                    break;
            }
        }
    }
}
