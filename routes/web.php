<?php

use App\Http\Controllers\AdminBillController;

Route::get('/admin','AdminController@loginAdmin');
Route::get('/logout','AdminController@logout');
Route::post('/admin','AdminController@postLoginAdmin');


// Load trang view home
Route::get('/', 'HomeController@index')->name('home');
//Delivery
Route::get('/delivery','AdminDeliveryController@index');
Route::get('/add-delivery','AdminDeliveryController@create');
Route::post('/insert-delivery','AdminDeliveryController@store');
Route::post('/select-delivery','AdminDeliveryController@select');
Route::get('/print-bill','AdminBillController@print_bill');

// Feedback
Route::post('/allow-feedback','AdminFeedbackController@allow_feedback');
Route::post('/reply-feedback','AdminFeedbackController@reply_feedback');



Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            // link cac route categories
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            //'middleware' => 'can:category-list'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            //'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store',
            
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            //'middleware' => 'can:category-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            //'middleware' => 'can:category-delete',
        ]);
    });
    
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            // tao cac route menus/
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
            //'middleware' => 'can:menu-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create',
            //'middleware' => 'can:menu-add',
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit',
            //'middleware' => 'can:menu-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete',
            //'middleware' => 'can:menu-delete',
        ]);
    });
    // Product
    Route::prefix('products')->group(function () {
        Route::get('/', [
            // link cac route categories
            'as' => 'products.index',
            'uses' => 'AdminProductController@index',
            //'middleware' => 'can:product-list',
        ]);
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'AdminProductController@create',
            //'middleware' => 'can:product-add',
        ]);
        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit',
            //'middleware' => 'can:product-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete',
            //'middleware' => 'can:product-delete',
        ]);
    });
    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'AdminSliderController@index',
            //'middleware' => 'can:slider-index',
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'AdminSliderController@create',
            //'middleware' => 'can:slider-add',
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit',
            //'middleware' => 'can:slider-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete',
            //'middleware' => 'can:slider-delete',
        ]);
    });

    // USers
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'AdminUserController@index',
            //'middleware' => 'can:user-index',
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'AdminUserController@create',
            //'middleware' => 'can:user-add',
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit',
            //'middleware' => 'can:user-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete',
            //'middleware' => 'can:user-delete',
        ]);
    });
    // Role
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index',
            //'middleware' => 'can:role-index',
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create',
            //'middleware' => 'can:role-add',
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit',
            //'middleware' => 'can:role-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'AdminRoleController@delete',
            //'middleware' => 'can:role-delete',
        ]);
    });

    // Permissions
    Route::prefix('permissions')->group(function () {
        
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'AdminPermissionController@createPermissions'
        ]);

        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'AdminPermissionController@store'
        ]);
        
    });
    // Customers
    Route::prefix('customers')->group(function () {
        
        Route::get('/', [
            'as' => 'customers.index',
            'uses' => 'AdminCustomerController@index'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'customers.delete',
            'uses' => 'AdminRoleController@delete',
        ]);
        
    });
    Route::prefix('bills')->group(function () {
        
        Route::get('/', [
            'as' => 'bills.index',
            'uses' => 'AdminBillController@index'
        ]);
        Route::get('/export', [
            'as' => 'bills.export',
            'uses' => 'AdminBillController@export'
        ]);
        Route::get('/detail/{id}', [
            'as' => 'bills.detail',
            'uses' => 'AdminBillController@detail'
        ]);
        Route::get('/update/{id}', [
            'as' => 'bills.update',
            'uses' => 'AdminBillController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'bills.delete',
            'uses' => 'AdminBillController@delete'
        ]);
        Route::get('/cancel/{id}', [
            'as' => 'bills.cancel',
            'uses' => 'AdminBillController@cancel'
        ]);

        
    });
    Route::prefix('coupons')->group(function () {
        
        Route::get('/', [
            'as' => 'coupons.index',
            'uses' => 'AdminCouponController@index'
        ]);
        Route::get('/create', [
            'as' => 'coupons.create',
            'uses' => 'AdminCouponController@create'
        ]);
        Route::post('/store', [
            'as' => 'coupons.store',
            'uses' => 'AdminCouponController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'coupons.edit',
            'uses' => 'AdminCouponController@edit',
            //'middleware' => 'can:role-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'coupons.update',
            'uses' => 'AdminCouponController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'coupons.delete',
            'uses' => 'AdminCouponController@delete'
        ]);

        
    });
    Route::prefix('promotions')->group(function () {
        Route::get('/', [
            // link cac route categories
            'as' => 'promotions.index',
            'uses' => 'AdminPromotionController@index',
        ]);
        Route::get('/create', [
            'as' => 'promotions.create',
            'uses' => 'AdminPromotionController@create',
        ]);
        Route::post('/store', [
            'as' => 'promotions.store',
            'uses' => 'AdminPromotionController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'promotions.edit',
            'uses' => 'AdminPromotionController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'promotions.update',
            'uses' => 'AdminPromotionController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'promotions.delete',
            'uses' => 'AdminPromotionController@delete',
        ]);
    });
    Route::prefix('feedbacks')->group(function () {
        
        Route::get('/', [
            'as' => 'feedbacks.index',
            'uses' => 'AdminFeedbackController@index'
        ]);
       
        Route::get('/edit/{id}', [
            'as' => 'feedbacks.edit',
            'uses' => 'AdminFeedbackController@edit',
            //'middleware' => 'can:role-edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'feedbacks.update',
            'uses' => 'AdminFeedbackController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'feedbacks.delete',
            'uses' => 'AdminFeedbackController@delete'
        ]);

        
    });
});