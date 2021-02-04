<?php


namespace App\ConfirmOrderDeliveryModule;


use App\BaseCode\Strings;

class ConfirmOrderDeliveryHelper
{

    public function getEncryptedString($confirmDeliveryPb)
    {
        $string = "";
        foreach ($confirmDeliveryPb->getData() as $value) {
            if (Strings::notEmpty($string)) {
                $string = $string."/" . $value;
            } else {
                $string = $value;
            }
        }
        return $string;
    }
}
