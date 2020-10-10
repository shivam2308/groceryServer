<?php 

namespace App\ItemPbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\ItemPbModule\ItemIndexers;
use App\Protobuff\ItemPb;
use App\EntityPbModule\EntityConvertor;
use App\NamePbModule\NameConvertor;
use App\ImagePbModule\ImageConvertor;
use App\TimePbModule\TimeConvertor;


class ItemConvertor implements IConvertor {

    private $m_entityConvertor;
    private $m_nameConvertor;
    private $m_imageConvertor;
    private $m_timeConvertor;

    public function __construct(){
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_nameConvertor = new NameConvertor();
        $this->m_imageConvertor = new ImageConvertor();
        $this->m_timeConvertor = new TimeConvertor();
    }

    public function convert($array){
        $itemPb = new ItemPb();
        $itemPb->setDbInfo($this->m_entityConvertor->convert($array));
        $itemPb->setTime($this->m_timeConvertor->convert($array));
        $itemPb->setItemName($this->m_nameConvertor->convert($array));
        $itemPb->setItemUrl($this->m_imageConvertor->convert($array));
        $itemPb->setQuantity($array[ItemIndexers::getQUANTITY()]);
        $itemPb->setPrice($array[ItemIndexers::getPRICE()]);
        return $itemPb;
    }
}
?>