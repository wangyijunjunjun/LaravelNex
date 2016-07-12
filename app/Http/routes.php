<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Entity\Member;

Route::get('/', function () {

    return view('welcome');
});

//登录注册
Route::get('/login', 'View\MemberController@toLogin');
Route::get('/register', 'View\MemberController@toRegister');

//产品类别
Route::get('/category', 'View\BookController@toCategory');
Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');
Route::get('/product/{product_id}', 'View\BookController@toPdt_content');


Route::any('service/vidate_code/send', 'Service\ValidateCodeController@sendSMS');

//这个路由很重要,解释了很多事情
Route::any('service/validate_code/create', 'Service\ValidateCodeController@create');

Route::group(['prefix' => 'service'], function () {
    Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');

    Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
});