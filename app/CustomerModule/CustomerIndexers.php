<?php
namespace App\CustomerModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class CustomerIndexers extends Enum{
    const PRIVILEGE = 'PRIVILEGE';

    public static function getPRIVILEGE(){
        return Enums::value(CustomerIndexers::fromValue(CustomerIndexers::PRIVILEGE));
    }

}

?>