<?php

namespace App\PaymentPbModule;


use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\PaymentPb;
use App\Protobuff\PaymentSearchResponsePb;

class PaymentService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new PaymentPb(),new PaymentUpdator(), new PaymentConvertor(), new PaymentSearcher(), new PaymentSearchResponsePb(), PaymentTableName::getTableName());
    }
}

?>
