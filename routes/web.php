<?php

use Illuminate\Support\Facades\Route;
use App\ServerConfig\ServerListner;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\RequestMethodEnum;
use App\RegistrationModule\RegistrationRequestHandler;
use App\BaseCode\Strings;
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
    $serverListner  = new ServerListner();
    return csrf_token();
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
    $handler =new \App\PushNotificationPbModule\PushNotificationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::PUT);
});

Route::post('/registration', function (Request $request) {
    $handler = new RegistrationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});

Route::post('/sendPushNotification', function (Request $request) {
    $handler = new \App\SendPushNotification\SendPushNotificationRequestHandler();
    return $handler->handle(json_encode(json_decode($request->getContent(), true)), RequestMethodEnum::POST);
});
