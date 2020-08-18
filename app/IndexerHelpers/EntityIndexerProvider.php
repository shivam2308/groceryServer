<?php

class EntityIndexerProvider{

    Private $data;

    function __construct($name) {
        $this->data = EntityIndexer::fromValue(EntityIndexer::DATA);;
    }

    function getDATA(){
        return $this->data;
    }

}

?>