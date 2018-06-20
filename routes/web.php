<?php

//Admin

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'HomeController@index')->name('admin.home');
        Route::post('/home/send', 'HomeController@mail')->name('admin.send');
        Route::get('/profile', 'ProfileController@index')->name('admins.profile');
        Route::post('/profile', 'ProfileController@store')->name('admins.profileStore');
        Route::resource('/products', 'ProductController');
        Route::resource('/customize', 'CustomizeController');
        Route::resource('/roles', 'RoleController');
        Route::resource('/users', 'UserController');
        Route::resource('/specials', 'SpecialController');
        Route::resource('/admins', 'AdminController');
        Route::resource('/coupons', 'CouponController');
        Route::get('/orders','OrderController@index')->name('orders.index');
        Route::get('/finishedOrders','FinishedOrderController@index')->name('finishedOrders.index');
        Route::get('/destroyOrders','FinishedOrderController@destroy')->name('finishedOrders.destroy');
        Route::post('/finishedOrder/info','FinishedOrderController@info');
        Route::post('/orders/destroy','OrderController@destroy')->name('orders.destroy');
        Route::post('/orders/finish','OrderController@finish')->name('orders.finish');
        Route::post('/orders/onOff','OrderController@onOff');
        Route::post('/orders/status','OrderController@changeStatus');
        Route::post('/orders/info','OrderController@info');
        Route::post('/orders/clearAll','OrderController@clearAll');
        Route::post('/orders/done','OrderController@done')->name('orders.done');
        Route::get('/messages', 'MessageController@index')->name('message.index');
        Route::delete('/messages/{id}', 'MessageController@destroy')->name('message.destroy');

        Route::post('/coupon', 'CouponController@coupon')->name('coupon.coupon');
        Route::delete('/coupon', 'CouponController@delete')->name('coupon.delete');
        Route::get('/errors', function () { return view('errors.404Admin'); })->name('errors.admin');

        //Auth Admin
        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');


        /*
        Route::get('/birthday', function() {
            Artisan::call('schedule:run');

            return 'yes';
        });
        */
    });
});


//User

Route::namespace('User')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/menu', 'MenuController@menu')->name('user.categoryMenu');
    Route::get('/menu-category', 'MenuController@index')->name('user.menu');
    Route::post('/menu/popUp', 'MenuController@popUp')->name('user.popUp');
    Route::post('/menu/info', 'MenuController@addCart');
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/favorites', 'CartController@favorites');
    Route::post('/cart/item', 'CartController@store')->name('cart.store');
    Route::post('/cart/remove', 'CartController@destroy')->name('cart.destroy');
    Route::get('/cart/remove_all', 'CartController@destroyAll')->name('cart.destroyAll');
    Route::post('/cart/changeQty', 'CartController@changeQty')->name('cart.changeQty');
    //Customize
    Route::get('/customize', 'CustomizeController@index')->name('customizeUser.index');
    Route::post('/customize', 'CustomizeController@setUp')->name('customizeUser.setUp');
    Route::post('/customize/size', 'CustomizeController@size');
    Route::post('/customize/store', 'CustomizeController@store')->name('customizeUser.store');
    Route::put('/customize/edit/{id}', 'CustomizeController@edit')->name('customizeUser.edit');
    Route::post('/customize/update', 'CustomizeController@updateRow')->name('customizeUser.updateRow');
    //Rewards
    Route::post('/customize/rewards-one', 'CustomizeController@rewardsOne')->name('customizeUser.rewardsOne');
    Route::post('/customize/rewards-two', 'CustomizeController@rewardsTwo')->name('customizeUser.rewardsTwo');
    Route::post('/customize/rewards-three', 'CustomizeController@rewardsThree')->name('customizeUser.rewardsThree');
    Route::put('/customize/rewards-one/{id}', 'CustomizeController@rewardsOneEdit')->name('customizeUser.rewardsOneEdit');
    Route::put('/customize/rewards-two/{id}', 'CustomizeController@rewardsTwoEdit')->name('customizeUser.rewardsTwoEdit');
    Route::put('/customize/rewards-three/{id}', 'CustomizeController@rewardsThreeEdit')->name('customizeUser.rewardsThreeEdit');

    Route::get('/contact', 'ContactUsController@index')->name('contactUser.index');
    Route::post('/contact', 'ContactUsController@store')->name('contactUser.store');

    Route::get('/reviews', function () { return view('user.reviews'); })->name('reviews');
    Route::get('/rewards', 'RewardsController@index')->name('rewards');
    Route::post('/rewards/dessert', 'RewardsController@dessert')->name('rewards.dessert');
    Route::get('/about-us', function () { return view('user.aboutUs'); })->name('aboutUs');
    Route::get('/errors', function () { return view('errors.404'); })->name('errors');


    Route::get('/cart/favorites', 'CartController@favorites')->name('cart.favorites');

    Route::get('/my-profile', 'FavoriteController@index')->name('favorite.index');
    Route::post('/my-favorites/add', 'FavoriteController@add')->name('favorite.add');
    Route::post('/my-favorites/delete', 'FavoriteController@delete');
    Route::post('/my-favorites/changeInfo', 'FavoriteController@changeInfo')->name('favorite.changeInfo');
    Route::post('/my-favorites/changePassword', 'FavoriteController@changePassword')->name('favorite.changePassword');
    Route::post('/my-favorites/changeEmail', 'FavoriteController@changeEmail')->name('favorite.changeEmail');

    Route::get('/pre-checkout', 'CheckOutController@preCheckout')->name('preCheckout');
    Route::post('/pre-checkout', 'CheckOutController@preCheckoutEdit')->name('preCheckoutEdit');
    Route::post('/checkout-done', 'CheckOutController@CheckoutDone')->name('CheckoutDone');

    Route::post('/thank-you', 'OrderController@store')->name('makeOrder');

    Route::get('/register/verify', 'Auth\RegisterController@verify')->name('verify');
    Route::get('/verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

    Route::post('/online-payment', 'PaymentController@pay')->name('onlinePayment');

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
    });
    Route::get('/terms', function() { return view('user.terms'); })->name('terms');
    Route::get('/privacy', function() { return view('user.privacy'); })->name('privacy');
});

Route::get('/specials','Admin\SpecialController@specials')->name('specials');
Route::post('/specials/popUp','Admin\SpecialController@popUp');
Route::post('/specials/addToCart','Admin\SpecialController@addToCart')->name('special.add');
Route::post('/specials/YourOrder','Admin\SpecialController@YourOrder');
//Auth User

Auth::routes();