<?php


Route::post('auth', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@request');
Route::post('signup', 'Auth\RegisterController@request');
Route::post('forgot-password', 'Auth\ForgetPasswordController@request');
Route::post('logout', 'Auth\LoginController@logout');

Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//User
Route::group(['prefix' => 'user','middleware'=>'auth:api'], function() {

    Route::post('dashboard', 'UserController@dashboard');

    Route::post('backlog', 'UserController@backlog');
    
    Route::post('backlog-sync', 'UserController@backlogSync');

    
    Route::post('gallery', 'UserController@gallery');
    

    Route::post('notification', 'UserController@keepSaveOrDelete');
    Route::post('notification-first', 'UserController@firstPayment');
    Route::post('add-card', 'UserController@addCard');
    // Route::post('notification', function(){
    // 	return "ok";
    // });

    Route::post('keep', 'UserController@keep');

    Route::post('change-password', 'UserController@changePassword');

    Route::post('details', 'UserController@details');
    Route::post('update-details', 'UserController@updateDetails');
    Route::post('contactus', 'UserController@contactUs');

    

    Route::group(['prefix'=> 'strip'], function(){

        Route::post('add-amount', 'TransactionController@addAmountStrip');
    });


    Route::group(['prefix'=> 'address'], function(){

        Route::get('', 'AddressController@getAll');
        Route::post('/add', 'AddressController@add');
        Route::post('/detail', 'AddressController@detail');
        Route::post('/update', 'AddressController@update');
        Route::post('/delete', 'AddressController@delete');
    });


    Route::group(['prefix' => 'cart', 'middleware'=>'auth:api'], function(){
        Route::post('/add-item', 'CartController@addItem');
        Route::post('/list', 'CartController@cartData');
        Route::post('/update', 'CartController@update');
        Route::post('/delete', 'CartController@destroy');
    });


    Route::group(['prefix' => 'order'], function() {
        Route::post('list', 'OrderController@orderList');
        Route::post('create', 'OrderController@CreateOrder');
        Route::post('detail', 'OrderController@orderDetail');
    });


    Route::group(['prefix' => 'transaction'], function() {
        Route::post('list', 'TransactionController@list');
        Route::post('detail', 'TransactionController@detail');
    });

});


