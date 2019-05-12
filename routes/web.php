<?php
Route::group(['middleware'=>'auth'],function (){

    Route::get('/', function () {
        session(['a'=>'webshop']);
        //echo session('a');
        return view('welcome',['a'=>session('a')]);
    });
    Route::get('/home',function(){
        return view('welcome');
    });


});

Route::get('test',function (){

    return view('test');
});

Route::get('layout',function (){

    return view('layout');

});



Route::get('/login',function (){
    return view('auth.login');
});

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');

Route::get('request',function (){
    try {

        $gateway = \Gateway::Zarinpal();

         $gateway->setCallback(url('callback'));
        $gateway
            ->price(1000)
            // setShipmentPrice(10) // optional - just for paypal
            // setProductName("My Product") // optional - just for paypal
            ->ready();

        $refId =  $gateway->refId(); // شماره ارجاع بانک
        $transID = $gateway->transactionId(); // شماره تراکنش

        // در اینجا
        //  شماره تراکنش  بانک را با توجه به نوع ساختار دیتابیس تان
        //  در جداول مورد نیاز و بسته به نیاز سیستم تان
        // ذخیره کنید .

        return $gateway->redirect();

    } catch (\Exception $e) {

        echo $e->getMessage();
    }

});

Route::any('callback',function (){

    try {

        $gateway = \Gateway::verify();
        $trackingCode = $gateway->trackingCode();
        $refId = $gateway->refId();
        $cardNumber = $gateway->cardNumber();

        // تراکنش با موفقیت سمت بانک تایید گردید
        // در این مرحله عملیات خرید کاربر را تکمیل میکنیم

    } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {

        // تراکنش قبلا سمت بانک تاییده شده است و
        // کاربر احتمالا صفحه را مجددا رفرش کرده است
        // لذا تنها فاکتور خرید قبل را مجدد به کاربر نمایش میدهیم

        echo $e->getMessage() . "<br>";

    } catch (\Exception $e) {

        // نمایش خطای بانک
        echo $e->getMessage();
    }

});


