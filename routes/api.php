<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Category
    Route::post('categories/media', 'CategoryApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoryApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Setting
    Route::apiResource('settings', 'SettingApiController');

    // Message
    Route::apiResource('messages', 'MessageApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController', ['except' => ['store', 'show', 'destroy']]);
});
