<?php

use App\OrderListPbModule\OrderedListRequestHandler;
use Illuminate\Support\Facades\Route;
use App\ServerConfig\ServerListner;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\RequestMethodEnum;
use App\RegistrationModule\RegistrationRequestHandler;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $serverListner = new ServerListner();
    return $serverListner->getEnvironment();
});

Route::get('/customer/{id}', function ($id) {
    $handler = new CustomerRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/customer', function (Request $request) {
    $handler = new CustomerRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/customer', function (Request $request) {
    $handler = new CustomerRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/login/{id}', function ($id) {
    $handler = new \App\LoginPbModule\LoginRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/login', function (Request $request) {
    $handler = new \App\LoginPbModule\LoginRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/login', function (Request $request) {
    $handler = new \App\LoginPbModule\LoginRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/item/{id}', function ($id) {
    $handler = new \App\ItemPbModule\ItemRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/item', function (Request $request) {
    $handler = new \App\ItemPbModule\ItemRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/item', function (Request $request) {
    $handler = new \App\ItemPbModule\ItemRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/pushNotification/{id}', function ($id) {
    $handler = new \App\PushNotificationPbModule\PushNotificationRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/pushNotification', function (Request $request) {
    $handler = new \App\PushNotificationPbModule\PushNotificationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/pushNotification', function (Request $request) {
    $handler = new \App\PushNotificationPbModule\PushNotificationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::post('/registration', function (Request $request) {
    $handler = new RegistrationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::post('/createBuy', function (Request $request) {
    $handler = new \App\BuyModule\CreateBuyRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::post('/sendPushNotification', function (Request $request) {
    $handler = new \App\SendPushNotification\SendPushNotificationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});
Route::get('/payment/{id}', function ($id) {
    $handler = new \App\PaymentPbModule\PaymentRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/payment', function (Request $request) {
    $handler = new \App\PaymentPbModule\PaymentRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/payment', function (Request $request) {
    $handler = new \App\PaymentPbModule\PaymentRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/buy/{id}', function ($id) {
    $handler = new \App\BuyPbModule\BuyRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/buy', function (Request $request) {
    $handler = new \App\BuyPbModule\BuyRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/buy', function (Request $request) {
    $handler = new \App\BuyPbModule\BuyRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/orderList/{id}', function ($id) {
    $handler = new OrderedListRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});
Route::post('/confirmOrder', function (Request $request) {
    $handler = new \App\ConfirmOrderDeliveryModule\ConfirmOrderDeliveryRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});
Route::post('/createImage', function (Request $request) {
    $handler = new \App\CreateImageModule\CreateImageRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});
Route::get('/image/{id}', function ($id) {
    $handler = new \App\ImagePbModule\ImageRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::post('/image', function (Request $request) {
    $handler = new \App\ImagePbModule\ImageRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::put('/image', function (Request $request) {
    $handler = new \App\ImagePbModule\ImageRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::get('/assignDeliveryMan/{id}', function ($id) {
    $handler = new \App\AssignDeliveryManModule\AssignDeliveryMenRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

Route::get('/closeAndOutForDelivery/{id}', function ($id) {
    $handler = new \App\CloseAndOutForDeliveryModule\CloseAndOutForDeliveryRequestHandler();
    return $handler->handle(urldecode($id), RequestMethodEnum::GET);
});

