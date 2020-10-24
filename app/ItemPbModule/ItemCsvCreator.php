<?php

namespace App\ItemPbModule;

use App\BaseCode\BaseCsvCode\BaseCsv;
use App\Protobuff\ItemQuantityTypeEnum;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\TimeZoneEnum;

class ItemCsvCreator extends BaseCsv
{
    private $m_defaultPbProvider;
    public function __construct()
    {
        parent::__construct('D:\ShivamProject\groceryServer\app\ItemPbModule\itemSheet.csv', "", new ItemService(), NULL, $this);
        $this->m_defaultPbProvider = new ItemPbDefaultProvider();
    }

    public function getUipb($row)
    {
        $itemPb = $this->m_defaultPbProvider->getDefaultPb();
        $itemPb->getItemName()->setFirstName($row[0]);
        $itemPb->setItemType(ItemTypeEnum::value($row[1]));
        $itemPb->setPrice((int)$row[2]);
        $itemPb->setQuantity((int)$row[3]);
        $itemPb->setQuantityType(ItemQuantityTypeEnum::value($row[4]));
        $itemPb->getTime()->setTimezone(TimeZoneEnum::IST);
        return $itemPb;
    }
}
