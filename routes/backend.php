<?php

//Admin login /* checked ep35 1517 */
Route::group(['prefix'=>'admin'],function(){
Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login');
});

//Admin dashboard
    Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    //Banner Section
    Route::resource('/banner',\App\Http\Controllers\BannerController::class);
    Route::post('banner_status',[\App\Http\Controllers\BannerController::class,'bannerStatus'])->name('banner.status');

    //Category Section
    Route::resource('/category',\App\Http\Controllers\CategoryController::class);
    Route::post('category_status',[\App\Http\Controllers\CategoryController::class,'categoryStatus'])->name('category.status');

    Route::post('category/{id}/child',[\App\Http\Controllers\CategoryController::class,'getChildByParentID']);

    //Brand Section
    Route::resource('/brand',\App\Http\Controllers\BrandController::class);
    Route::post('brand_status',[\App\Http\Controllers\BrandController::class,'brandStatus'])->name('brand.status');

    //Product Section
    Route::resource('/product',\App\Http\Controllers\ProductController::class);
    Route::post('product_status',[\App\Http\Controllers\ProductController::class,'productStatus'])->name('product.status');

    // Product Attribute Section
    Route::post('product-attribute/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttributeDelete'])->name('product.attribute.destroy');

    //User Section
    Route::resource('/user',\App\Http\Controllers\UserController::class);
    Route::post('user_status',[\App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');

    // Shipping Section
    Route::resource('/shipping',\App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status',[\App\Http\Controllers\ShippingController::class,'shippingStatus'])->name('shipping.status');

    // Order Section
    Route::resource('order',\App\Http\Controllers\OrderController::class);/* checked ep37 5515 */
    Route::post('order-status',[\App\Http\Controllers\OrderController::class,'orderStatus'])->name('order.status');/* checked ep37 5515 */

    // Merchant Section
    Route::resource('merchant',\App\Http\Controllers\MerchantController::class);/* checked ep41 4222 */
    Route::post('merchant-status',[\App\Http\Controllers\MerchantController::class,'merchantStatus'])->name('merchant.status');/* checked ep41 4222 */
    Route::post('merchant-verified',[\App\Http\Controllers\MerchantController::class,'merchantVerified'])->name('merchant.verified');/* checked ep41 5143 */

});

/* coded ep41 2055 */
Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});