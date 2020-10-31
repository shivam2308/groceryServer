<?php

namespace App\BaseCode\BaseModule;

use App\BaseCode\JsonConvertor\JsonConvertor;

class BaseRefConvertorAndUpdator
{

    public function update($pb)
    {
        return JsonConvertor::json($pb);
    }

    public function convert($json, $pb)
    {
        return JsonConvertor::protobuff($json, $pb);
    }
}
