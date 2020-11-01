<?php

use Illuminate\Support\Facades\Route;
use App\ServerConfig\ServerListner;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\RequestMethodEnum;
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