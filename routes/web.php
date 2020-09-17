<?php

use Illuminate\Support\Facades\Route;
use App\ServerConfig\ServerListner;
use App\CustomerModule\CustomerRequestHandler;
use App\Protobuff\RequestMethodEnum;

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
    return $serverListner->getEnvironment();
});

Route::get('/customer/{id}', function ($id) {
    $handler = new CustomerRequestHandler();
    return $handler->handle(urldecode($id),RequestMethodEnum::GET);
});
