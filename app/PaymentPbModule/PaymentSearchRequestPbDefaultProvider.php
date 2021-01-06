<?php

namespace App\PaymentPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\PaymentSearchRequestPb;

class PaymentSearchRequestPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb()
    {
        $pb = new PaymentSearchRequestPb();
        return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}

?>
