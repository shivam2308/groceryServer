<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Database\DatabaseExecutor;
use App\BaseCode\IntegerToAlphaConvertor;
use App\CustomerModule\CustomerService;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\CustomerPb;
use App\Protobuff\CustomerSearchRequestPb;
use App\CustomerModule\CustomerSearchRequestPbDefaultProvider;
use App\EntityPbModule\EntityIndexers;
use App\Protobuff\EntityPb;
use App\Protobuff\RequestMethodEnum;
use App\Protobuff\PrivilegeTypeEnum;
use App\BaseCode\Strings;
use App\BaseCode\JsonConvertor\JsonConvertor;
use \Memcache;
use Doctrine\Common\Cache\MemcacheCache;
use App\Protobuff\ItemPb;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\ItemPbModule\ItemPbDefaultProvider;
use App\ItemPbModule\ItemService;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->getResultsPb();
        //$this->pbJsonConvert();
        //$this->myurldecode();
        //$this->testCache();
        $this->createItem();
    }

    // public function testCache(){
    //     $memcache = new Memcached();
    //     $cache = new MemcacheCache();
    //     $cache->setMemcache($memcache);
        
    //     $cache->set('key', 'value');
        
    //     echo $cache->get('key') ;// prints "value"
        
    // }

    public function myurldecode(){
        echo urldecode("X");
    }
    public function pbJsonConvert(){
        $pb =new CustomerSearchRequestPb();
        $res = $pb->mergeFromJsonArray();
        //echo JsonConvertor::json($pb);
        $dpb = new CustomerSearchRequestPbDefaultProvider();
        echo JsonConvertor::json(JsonConvertor::protobuff("{\"privilege\":\"NORMAL\"}",$dpb->getDefaultPb()));
    }

    public function getResultsPb(){
        $service = new CustomerRequestHandler();
        echo $service->handle("{\"privilege\":\"NORMAL\"}",RequestMethodEnum::GET);
    }

    public function createItem() {
        $pb = new ItemPbDefaultProvider();
        $service = new ItemService();
        $itemPb = $pb->getDefaultPb();
        $itemPb->getItemName()->setFirstName('potato');
        $itemPb->getItemName()->setLastName('potato');
        $itemPb->getItemName()->setCanonicalName('Allu');
        $itemPb->getItemUrl()->setUrl('potato');
        $itemPb->setItemType(ItemTypeEnum::VEGETABLES);
        $itemPb->setAvailabilityStatus(AvailabilityStatusEnum::AVAILABLE);
        $service->create($itemPb);
    }
}
