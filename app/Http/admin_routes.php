<?php

/*Route::resource("categories", "CategoryController");

Route::resource("fQAs", "FQAsController");

Route::resource("contacts", "ContactController");

Route::resource("unitPrices", "UnitPriceController");

Route::resource("productTypes", "ProductTypeController");

Route::resource("infoTypes", "InfoTypeController");

Route::resource("suppliers", "SupplierController");

Route::resource("statusLogins", "StatusLoginController");

Route::resource("simCards", "SimCardController");

Route::resource("shopByPrices", "ShopByPriceController");

Route::resource("promotions", "PromotionController");

Route::resource("products", "ProductController");

Route::resource("payments", "PaymentController");

Route::resource("orderDetails", "OrderDetailController");

Route::resource("orders", "OrderController");

Route::resource("newsTypes", "NewsTypeController");

Route::resource("news", "NewsController");

Route::resource("members", "MemberController");

Route::resource("infos", "InfosController");*/

//Thong tin loại nhà cung cấp
Route::resource('infoSupplierTypes', 'InfoSupplierTypeController');

Route::get('infoSupplierTypes/{id}/delete', [
    'as' => 'infoSupplierTypes.delete',
    'uses' => 'InfoSupplierTypeController@destroy',
]);

//Thong tin nha cung cap
Route::resource('infoSuppliers', 'InfoSupplierController');

Route::get('infoSuppliers/{id}/delete', [
    'as' => 'infoSuppliers.delete',
    'uses' => 'InfoSupplierController@destroy',
]);

//Phụ kiện
Route::group(['prefix' => 'phu_kien'], function () {
    Route::get('danh_sach', [
        'as' => 'admin.accessories.index',
        'uses' => 'AccessoryController@index',
    ]);

    Route::get('tao_moi', [
        'as' => 'admin.accessories.create',
        'uses' => 'AccessoryController@create'
    ]);

    Route::post('tao_moi_post', [
        'as' => 'admin.accessories.store',
        'uses' => 'AccessoryController@store'
    ]);

    Route::get('xoa', [
        'as' => 'admin.accessories.delete',
        'uses' => 'AccessoryController@destroy',
    ]);

    Route::get('chi_tiet/{id}', [
        'as' => 'admin.accessories.show',
        'uses' => 'AccessoryController@show'
    ]);
});
//Loại phụ kiện
Route::resource("accessoryTypes", "AccessoryTypeController");
Route::group(['prefix' => '/'], function () {
    Route::get('/', [
        'as' => 'admin',
        'uses' => 'AdminController@index',
    ]);
});