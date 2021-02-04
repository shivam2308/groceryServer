<?php

namespace App\EnumProvider;

use App\Interfaces\IEnumProvider;
use App\Enums\EnvironmentType;

class EnvironmentTypeEnumProvider implements IEnumProvider{

    function getEnum($value){
        switch ($value) {
            case EnvironmentType::DEVEL:
                # code...
                break;

            default:
                # code...
                break;
        }
    }

    public function getValue($enum)
    {
        // TODO: Implement getValue() method.
    }
}

?>
