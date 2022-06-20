<?php


Route::group(['prefix'=>'merchant'],function(){/* checked ep40 1409 */
    Route::get('/login',[\App\Http\Controllers\Auth\Merchant\AuthController::class,'showLoginForm'])->name('merchant.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Merchant\AuthController::class,'login'])->name('merchant.login');
});

//Merchant dashboard
Route::group(['prefix'=>'merchant','middleware'=>['merchant']],function(){
Route::get('/',[\App\Http\Controllers\Merchant\MerchantController::class,'dashboard'])->name('merchant');

    // Product Section
    Route::resource('/merchant-product',\App\Http\Controllers\Merchant\ProductController::class);/* checked ep41 722 */
    Route::post('merchant_product_status',[\App\Http\Controllers\Merchant\ProductController::class,'productStatus'])->name('merchant.product.status');/* checked ep41 722 */
});


Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


