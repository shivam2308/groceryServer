<?php


namespace App\BaseCode;


class TableIndexCreateHandler
{
    public function createIndexes($table,$array){
        foreach ($array as $key => $value){
            switch (Enums::key(BaseIndexer::fromKey($value))){
                case BaseIndexer::STRING:
                    $table->string($key)->nullable();
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
}
