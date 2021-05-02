<?php

namespace Tests\Unit;

use App\BaseCode\EncryptorAndDecryptor;
use App\BuyModule\CreateBuyRequestDefaultPbProvider;
use App\BuyModule\CreateBuyRequestService;
use App\ConfirmOrderDeliveryModule\ConfirmOrderDeliveryService;
use App\EmailModule\SendEmailService;
use App\ItemPbModule\ItemSearchRequestPbDefaultProvider;
use App\OrderListPbModule\OrderListService;
use App\Protobuff\EmailBuilderPb;
use App\Protobuff\OrderedListSearchReqPb;
use App\Protobuff\SendNotificationTypeEnum;
use App\Protobuff\SendPushNotificationPb;
use App\RegistrationModule\RegistrationDefaultPbProvider;
use App\RegistrationModule\RegistrationService;
use App\SendPushNotification\SendPushNotificationService;
use Doctrine\Common\Cache\MemcachedCache;
use Exception;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Memcache;
use Memcached;
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
use App\Protobuff\ItemQuantityTypeEnum;
use App\ItemPbModule\ItemPbDefaultProvider;
use App\ItemPbModule\ItemService;

use App\Protobuff\BuyPb;
use App\Protobuff\DeliveryStatusEnum;
use App\BuyPbModule\BuyPbDefaultProvider;
use App\BuyPbModule\BuyService;
use App\PushNotificationPbModule\PushNotificationDefaultProvider;
use App\PushNotificationPbModule\PushNotificationService;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
       // ini_set("memory_limit", -1);
        //$this->getResultsPb();
        //$this->pbJsonConvert();
        //$this->myurldecode();
        //$this->testCache();
        // $this->createItem();
        // $this->createBuy();

        // $this->createItem();
        // $this->createBuy();
        //$this->createCustomer();
        //$this->searchItems();
        //$this->sendMail();
        //$this->createDeliveryMan();
        $this->createLogin();
        // $this->createItems();
       // $this->getIems();
        //$this->createRegistration();
        //$this->connectFirebase();
         //$this->createPushNotification();
        //$this->createBuyItems();
       // $this->getOrderList();
       // $this->decryptEncodedString("jh&393@465&gJ|gZ|gE|gM|&393@335#1608702799940|393@334#1608702798256|393@333#1608702796591|393@332#1608702794970|&1610291795123");
        //$this->confirmOrder("eBpkl7fjleZzLa8ufAx9hgmfdm/34tEPdVIJcvO8Vkz82Pw8ee2YfM/jIc38L2KrfIJqt+6tJxi2Bl/1BUQa1tRfSirsyfG+3wg1caqtMlxYYsM9jVyXACcyo1TxTejFyDvBZyjjd/fww+95fiQja0XkWstvRoELGcTNj0PWDTI=:bjBKMmpIYTBCWExiRXpIMw==");
        //$this->sendEmail();
        //$this->testCache();
       // $this->getAndUpdateLogin();
        //$this->sendPushNotification();
    }

    public function decryptEncodedString($data)
    {
        echo EncryptorAndDecryptor::encrypt($data);
    }

    public function createItems()
    {
        $creator = new ItemCsvCreator();
        $creator->createUiPb();
    }

    public function createLogin()
    {
        $service = new LoginService();

        echo JsonConvertor::json($service->update("1@nc",$service->get("1@nc")));
    }

     public function testCache(){
         $memcache = new Memcache();
         $memcache->connect('localhost', 11211);

         $cache = new MemcacheCache();
         $cache->setMemcache($memcache);

         $cache->save("key","h",1);

         echo $cache->fetch('key1') ;// prints "value"

     }

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
        $itemPb->setItemType(ItemTypeEnum::VEGETABLES);
        $itemPb->setPrice(30);
        $itemPb->setQuantity(1);
        $itemPb->setAvailabilityStatus(AvailabilityStatusEnum::AVAILABLE);
        $itemPb->setItemQuantityType(ItemQuantityTypeEnum::KILO_GRAMS);
        //$service->get('n3');
        //echo JsonConvertor::json($service->get('ry'));
        $service->create($itemPb);
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
        echo JsonConvertor::json($service->get("jY"));
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
        $message = CloudMessage::withTarget('token', 'dJcZl_kuTwGWnb4NL2WNVQ:APA91bHcN_NUqHPF0zeoTIYkObHOkakC7H2zstgRk2XqwrsqcdRcZuyDXGzfom2nlsPqKvZ5EYcfqPtV8a-LfDdQuM8lejLCTtZJ-UIuKVR6KDEKNc6LZGBnpjcYnh6_yppxG6t2iUgl')
            ->withNotification(Notification::create('Title', 'Body'));
        $bucket = $storage->send($message);
        var_dump($bucket);

    }

    public function createPushNotification()
    {
        $pb = new PushNotificationDefaultProvider();
        $service = new PushNotificationService();
        $pushNotificationPb = $pb->getDefaultPb();
        $pushNotificationPb->getCustomerRef()->setId('cus-not-123');
        $pushNotificationPb->getCustomerRef()->getName()->setFirstName('push-not-f1');
        $pushNotificationPb->getCustomerRefgit()->getName()->setLastName('push-not-f2');
        $pushNotificationPb->getCustomerRef()->getName()->setCanonicalName('push-not-c1');
        $pushNotificationPb->setToken('push@noti#123');
        $pushNotificationPb->getTime()->setTimezone(TimeZoneEnum::IST);
        //echo JsonConvertor::json ($service->get('mU'));
        //echo ($service->get('n3')->getItemUrl()->getUrl());
        $service->create($pushNotificationPb);
    }

    private function searchItems()
    {
        $service = new ItemService();
        $provider = new  ItemSearchRequestPbDefaultProvider();
        $builder = $provider->getDefaultPb();

        $builder->setAvailabilityStatus(AvailabilityStatusEnum::AVAILABLE);
        $builder->setItemType(ItemTypeEnum::DAIRY);

        echo JsonConvertor::json($service->search($builder));
    }

    private function sendMail()
    {
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('amazaar.noreply@gmail.com')
            ->setPassword('amazaar@123');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom(['noreply@amazaar.com' => 'Amazaar'])
            ->setTo(['shivamcchaurasiya2308@gmail.com' => 'Shivam Chaurasiya'])
            ->setBody('<strong>Hello</strong>')
            ->setContentType('text/html');

        // Send the message
        $result = $mailer->send($message);
        var_dump($result);
    }

    private function createBuyItems()
    {
        $createService = new CreateBuyRequestService();
        $createBuy = new CreateBuyRequestDefaultPbProvider();
        $pb = $createBuy->getDefaultPb();
        $pb->setCustomerId("tZ");
        $arr = array();
        $arr[0] = "t9@3";
        $arr[1] = "t2@2";
        $pb->setItemIdAndQuantity($arr);
        $createService->create($pb);
    }

    private function getOrderList()
    {
        $service = new OrderListService();
        $req = new OrderedListSearchReqPb();
        $req->setCustomerId("te");
        echo JsonConvertor::json($service->search($req));
    }

    private function confirmOrder(string $string)
    {
        $service = new ConfirmOrderDeliveryService();
        echo JsonConvertor::json($service->get($string));
    }

    private function sendEmail()
    {
        $service = new SendEmailService();
        $emailbuilder = new  EmailBuilderPb();
        $emailbuilder->setTo("shubhamtiwaricr07@gmail.com");
        $emailbuilder->setReciverName("Shubham Tiwari");
        $emailbuilder->setSubject("This is Test Mail");
        $emailbuilder->setBody("Hello");
        $service->send($emailbuilder);
    }

    private function getAndUpdateLogin()
    {
        $service=new LoginService();
        $pb = $service->get("g-");
        $service->update($pb->getDbInfo()->getId(),$pb);
    }

    private function sendPushNotification()
    {
        $servive = new SendPushNotificationService();
        $pb = new SendPushNotificationPb();
        $pb->setBody("body");
        $pb->setSubject("title");
        $pb->setSendType(SendNotificationTypeEnum::SINGLE);
        $pb->setRegistrationId("ekLi07xVQyi4DZeth0HZtk:APA91bE5IVPU9XceyKBe1BF8jzJKlyHv94hdw_1VP1nVXy0sltfdQQ8fhGenvWrnsyiuN7rvkbZsGYjho1EYQZU6mvg5huMpdW-khjg91E5fmOoWEsiSuRMv_5w83rxclee1hSu0ZQEn");
        $servive->create($pb);
    }

    private function getIems()
    {
        $service = new ItemService();
        echo JsonConvertor::json($service->get("30@W"));
    }


}









