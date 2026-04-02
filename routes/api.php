<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\banaresController;
use App\Http\Controllers\Api\contactUsController;
use App\Http\Controllers\Api\deliveryController;
use App\Http\Controllers\Api\favoritesController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\productsController;
use App\Http\Controllers\Api\rateController;
use App\Http\Controllers\Api\sectionsController;
use App\Http\Controllers\Api\prompCodeController;
use App\Http\Controllers\ConfigController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('configs', [ConfigController::class, 'index']);

Route::get('products_best_sellers', [productsController::class, 'get_best_sellers']);
Route::get('products_offer_rate', [productsController::class, 'get_offer_rate']);

Route::get('products_search', [productsController::class, 'products_search']);

Route::get('products/{id}', [productsController::class, 'get_product']);
Route::get('product_info', [productsController::class, 'product_info']);
Route::get('products', [productsController::class, 'get_all_products']);


// Route::get('brands', [companisController::class, 'get_all_brands']);
// Route::get('brand_products', [companisController::class, 'get_all_brand_products']);

Route::get('categories/{id}', [sectionsController::class, 'get_category']);
Route::get('categories', [sectionsController::class, 'get_all_categories']);
Route::get('get_sub_of_cat', [sectionsController::class, 'get_sub_of_cat']);

Route::get('category_products', [sectionsController::class, 'get_all_category_products']);


Route::post('testPhoto', [sectionsController::class, 'testPhoto']);

//  auth
// Registration route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/reset_pass', [AuthController::class, 'reset_pass']);
// Login route
Route::post('/login', [AuthController::class, 'login']);
Route::get('get_user_data', [AuthController::class, 'get_user_data']);
Route::post('update_user_data', [AuthController::class, 'update_user_data']);
Route::post('send_user_photo', [AuthController::class, 'send_user_photo']);
// end auth



// contact_us
Route::post('contact_us', [contactUsController::class, 'contact_us']);
// rate
Route::post('rate', [rateController::class, 'rate']);
Route::get('get_all_users_raiting', [rateController::class, 'get_all_users_raiting']);

// fav
Route::get('get_user_favorites', [favoritesController::class, 'get_user_favorites']);
Route::get('update_user_favorites', [favoritesController::class, 'update_user_favorites']);
Route::get('check_is_favorite', [favoritesController::class, 'check_is_favorite']);

// banares
Route::get('get_banares', [banaresController::class, 'get_banares']);

// orders
Route::post('make_order', [OrdersController::class, 'create_order']);
Route::get('get_all_orders', [OrdersController::class, 'get_all_orders']);
Route::get('cancel_order', [OrdersController::class, 'cancel_order']);

// user data
Route::get('CompanyData', [AuthController::class, 'CompanyData']);


// promocode
Route::post('check_promocode', [prompCodeController::class, 'check_promocode']);


// delivery
Route::get('get_all_delivery_places', [deliveryController::class, 'get_all_delivery_places']);
Route::get('get_delivery_price_by_userID', [deliveryController::class, 'get_delivery_price_by_userID']);


// Assigning middleware to group of routes
Route::middleware('auth:sanctum')->group(function () {
    // Add your protected API routes here
    // For example:
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
