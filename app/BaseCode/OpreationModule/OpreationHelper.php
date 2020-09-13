<?php

namespace App\BaseCode\OpreationModule;

use Exception;
use App\Enums\EnvironmentTypeEnum;

class OpreationHelper {

    function getTableName($table,$environment){
        return $table."_".$this->enviroment($environment);
    }

    function enviroment($environment){
        switch ($environment) {
            case EnvironmentTypeEnum::DEVEL:
                return EnvironmentTypeEnum::getDevel();
            case EnvironmentTypeEnum::PROD:
                return EnvironmentTypeEnum::getProd();
            default:
                return new Exception("No Environment Found !! check ServerLister");
        }
    }

}


?>