<?php

namespace Tests\Unit;

use App\RegistrationModule\RegistrationDefaultPbProvider;
use App\RegistrationModule\RegistrationService;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use PHPUnit\Framework\TestCase;
use Kreait\Firebase\Factory;
use App\Database\DatabaseExecutor;
use App\BaseCode\IntegerToAlphaConvertor;
use App\CustomerModule\CustomerService;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\CustomerPb;
use App\Protobuff\CustomerSearchRequestPb;
use App\CustomerModule\CustomerSearchRequestPbDefaultProvider;
use App\CustomerModule\CustomerPbDefaultProvider;
use App\EntityPbModule\EntityIndexers;
use App\Protobuff\StateEnum;
use App\Protobuff\CityEnum;
use App\Protobuff\EntityPb;
use App\Protobuff\RequestMethodEnum;
use App\Protobuff\TimeZoneEnum;
use App\Protobuff\GenderEnum;
use App\Protobuff\PrivilegeTypeEnum;
use App\BaseCode\Strings;
use App\BaseCode\JsonConvertor\JsonConvertor;
use App\DeliveryManPbModule\DeliveryManPbDefaultProvider;
use App\DeliveryManPbModule\DeliveryManService;
use App\ItemPbModule\ItemCsvCreator;
use App\LoginPbModule\LoginPbDefaultProvider;
use App\LoginPbModule\LoginService;
use Doctrine\Common\Cache\MemcacheCache;
use App\Protobuff\ItemPb;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\ItemPbModule\ItemPbDefaultProvider;
use App\ItemPbModule\ItemService;

use App\Protobuff\BuyPb;
use App\Protobuff\DeliveryStatusEnum;
use App\BuyPbModule\BuyPbDefaultProvider;
use App\BuyPbModule\BuyService;

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
        //$this->createItem();
        // $this->createBuy();
        //$this->createCustomer();

        //$this->createDeliveryMan();
        //$this->createLogin();
        //$this->createItems();
        //$this->createRegistration();
        $this->connectFirebase();
    }

    public function createItems()
    {
        $creator = new ItemCsvCreator();
        $creator->createUiPb();
    }

    public function createLogin()
    {
        $service = new LoginService();
        $defaultPbProvider = new LoginPbDefaultProvider();
        $pb = $defaultPbProvider->getDefaultPb();
        $pb->getCustomerRef()->setId('nZ');
        $pb->getCustomerRef()->getName()->setFirstName("Shubham");
        $pb->getCustomerRef()->getName()->setLastName("Tiwari");
        $pb->getCustomerRef()->getContact()->getEmail()->setLocalPart("shubhamtiwaricr07");
        $pb->getCustomerRef()->getContact()->getEmail()->setDomainPart("gmail.com");
        $pb->getCustomerRef()->getContact()->getMobile()->setMobileNo("9621019232");
        $pb->getTime()->setTimezone(TimeZoneEnum::IST);
        echo JsonConvertor::json($service->get("mK"));
    }

    // public function testCache(){
    //     $memcache = new Memcached();
    //     $cache = new MemcacheCache();
    //     $cache->setMemcache($memcache);

    //     $cache->set('key', 'value');

    //     echo $cache->get('key') ;// prints "value"

    // }
    //$this->createCustomer();
    //$this->createDeliveryMan();
    //echo csrf_token();
    // }

    public function createDeliveryMan()
    {
        $service = new  DeliveryManService();
        $defaultPbProvider = new DeliveryManPbDefaultProvider();
        $pb = $defaultPbProvider->getDefaultPb();
        $pb->getName()->setFirstName("Shubham");
        $pb->getName()->setLastName("Tiwari");
        $pb->getContact()->getEmail()->setLocalPart("shubhamtiwaricr07");
        $pb->getContact()->getEmail()->setDomainPart("gmail.com");
        $pb->getContact()->getMobile()->setMobileNo("9621019232");
        $pb->setAdharNo("12345678963214545");
        $pb->getTime()->setTimezone(TimeZoneEnum::IST);
        echo JsonConvertor::json($service->create($pb));
    }

    public function createCustomer()
    {
        $service = new CustomerService();
        $customerPbprovider = new CustomerPbDefaultProvider();
        $customerPb = $customerPbprovider->getDefaultPb();
        $customerPb->getName()->setFirstName("Shubham");
        $customerPb->getName()->setLastName("Tiwari");
        $customerPb->setPrivilege(PrivilegeTypeEnum::ADMIN);
        $customerPb->getContact()->getEmail()->setLocalPart("shubhamtiwaricr07");
        $customerPb->getContact()->getEmail()->setDomainPart("gmail.com");
        $customerPb->getContact()->getMobile()->setMobileNo("9621019232");
        $customerPb->getAddress()->setHomeNo("12345");
        $customerPb->getAddress()->setStreet("colony");
        $customerPb->getAddress()->setLandMark("Water Tank");
        $customerPb->getAddress()->setCity(CityEnum::LUCKNOW);
        $customerPb->getAddress()->setState(StateEnum::UTTAR_PRADESH);
        $customerPb->getAddress()->setPincode(226020);
        $customerPb->setGender(GenderEnum::MALE);
        $customerPb->getTime()->setTimezone(TimeZoneEnum::IST);
        //echo JsonConvertor::json($customerPb);
        $service->create($customerPb);
    }


    public function myurldecode()
    {
        echo urldecode("X");
    }

    public function pbJsonConvert()
    {
        $pb = new CustomerSearchRequestPb();
        //echo JsonConvertor::json($pb);
        $dpb = new CustomerSearchRequestPbDefaultProvider();
        echo JsonConvertor::json(JsonConvertor::protobuff("{\"privilege\":\"NORMAL\"}", $dpb->getDefaultPb()));
    }

    public function getResultsPb()
    {
        $service = new CustomerRequestHandler();
        echo $service->handle("{\"privilege\":\"NORMAL\"}", RequestMethodEnum::GET);
    }

    public function createItem()
    {
        $pb = new ItemPbDefaultProvider();
        $service = new ItemService();
        $itemPb = $pb->getDefaultPb();
        $itemPb->getTime()->setTimezone(TimeZoneEnum::IST);
        $itemPb->getItemName()->setFirstName('potato');
        $itemPb->getItemName()->setLastName('mishra123');
        $itemPb->getItemName()->setCanonicalName('Allu');
        $itemPb->getItemUrl()->setUrl('https://potato.com');
        $itemPb->setItemType(ItemTypeEnum::VEGETABLES);
        $itemPb->setPrice(30);
        $itemPb->setQuantity(1);
        $itemPb->setAvailabilityStatus(AvailabilityStatusEnum::AVAILABLE);
        //$service->get('n3');
        echo JsonConvertor::json($service->get('ry'));
    }

    public function createBuy()
    {
        $pb = new BuyPbDefaultProvider();
        $service = new BuyService();
        $buyPb = $pb->getDefaultPb();
        //$buyPb->setOrderId('firstbuy123');
        $buyPb->getCustomerRef()->setId('cus123');
        $buyPb->getCustomerRef()->getName()->setFirstName('f1');
        $buyPb->getCustomerRef()->getName()->setLastName('f1');
        $buyPb->getCustomerRef()->getName()->setCanonicalName('c1');
        $buyPb->getItemRef()->setId('item123');
        $buyPb->getItemRef()->getItemName()->setCanonicalName('item can name');
        $buyPb->getItemRef()->setPrice(35.0);
        $buyPb->setQuantity(2);
        //$buyPb->setPrice(30.0);
        //$buyPb->setDeliveryStatus(DeliveryStatusEnum::DELIVERED);
        $buyPb->getTime()->setTimezone(TimeZoneEnum::IST);
        //echo JsonConvertor::json ($service->get('mU'));
        //echo ($service->get('n3')->getItemUrl()->getUrl());
        $service->create($buyPb);
    }

    private function createRegistration()
    {
        $service = new RegistrationService();
        $registrationPbprovider = new RegistrationDefaultPbProvider();
        $registrationPb = $registrationPbprovider->getDefaultPb();
        $customerPbprovider = new CustomerPbDefaultProvider();
        $customerPb = $customerPbprovider->getDefaultPb();
        $customerPb->getName()->setFirstName("Shubham");
        $customerPb->getName()->setLastName("Tiwari");
        $customerPb->setPrivilege(PrivilegeTypeEnum::ADMIN);
        $customerPb->getContact()->getEmail()->setLocalPart("shubhamtiwaricr07");
        $customerPb->getContact()->getEmail()->setDomainPart("gmail.com");
        $customerPb->getContact()->getMobile()->setMobileNo("9621019232");
        $customerPb->getAddress()->setHomeNo("12345");
        $customerPb->getAddress()->setStreet("colony");
        $customerPb->getAddress()->setLandMark("Water Tank");
        $customerPb->getAddress()->setCity(CityEnum::LUCKNOW);
        $customerPb->getAddress()->setState(StateEnum::UTTAR_PRADESH);
        $customerPb->getAddress()->setPincode(226020);
        $customerPb->setGender(GenderEnum::MALE);
        $customerPb->getTime()->setTimezone(TimeZoneEnum::IST);
        $registrationPb->setCustomer($customerPb);
        echo JsonConvertor::json($service->create($registrationPb));
    }

    private function connectFirebase()
    {
        $factory = (new Factory())->withServiceAccount('D:\ShivamProject\groceryServer\app\amazaargrocery-firebase-adminsdk-76ctx-1a7876aa27.json');
        $storage = $factory->createMessaging();
        $message = CloudMessage::withTarget('token', 'fzRLNIquSE20D0x9TUbxuX:APA91bEc6qsFrW1uD_-1QO8sASQQ084pog_ezvXgiFpyK1HTN0F9mslPtTWsu1USXkaZBuou8Yzc89IrKm6XQain3e7LI7sHWpjZ1iYpeOIQOiCjMjYBNVFRPNiU7s30pqh6krTXABlv')
            ->withNotification(Notification::create('Title', 'Body'));
        $bucket = $storage->send($message);
        var_dump($bucket);

    }
}









