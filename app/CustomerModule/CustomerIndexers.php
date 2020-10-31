<?php

namespace App\CustomerModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class CustomerIndexers extends Enum
{
    const PRIVILEGE = 'PRIVILEGE';
    const CUSTOMER_REF_ID = 'CUSTOMER_REF_ID';
    const CUSTOMER_REF = 'CUSTOMER_REF';

    public static function getPRIVILEGE()
    {
        return Enums::value(CustomerIndexers::fromValue(CustomerIndexers::PRIVILEGE));
    }

    public static function getCUSTOMER_REF_ID()
    {
        return Enums::value(CustomerIndexers::fromValue(CustomerIndexers::CUSTOMER_REF_ID));
    }
    public static function getCUSTOMER_REF()
    {
        return Enums::value(CustomerIndexers::fromValue(CustomerIndexers::CUSTOMER_REF));
    }
}
