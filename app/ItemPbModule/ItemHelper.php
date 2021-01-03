<?php


namespace App\ItemPbModule;


use App\Protobuff\ItemPb;
use App\Protobuff\ItemPbRef;

class ItemHelper
{
    private $itemDefaultPbProvider;

    public function __construct()
    {
        $this->itemDefaultPbProvider = new ItemPbDefaultProvider();
    }

    public function getItemRef($itemPb){
        $itemRef = $this->itemDefaultPbProvider->getDefaultRefPb();
        $itemRef->setId($itemPb->getDbInfo()->getId());
        $itemRef->setItemName($itemPb->getItemName());
        $itemRef->setPrice($itemPb->getPrice());
        return $itemRef;
    }

}
