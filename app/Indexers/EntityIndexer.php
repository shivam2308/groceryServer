<?php

use BenSampo\Enum\Enum;

 class EntityIndexer extends Enum{
    const DATA = 'DATA';


    public function getData(){
        return $this::fromValue($this::DATA);
    }
}

?>