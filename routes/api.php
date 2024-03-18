<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\MemberApiController;
use App\Http\Controllers\Api\ProductApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api'
], function () {
    //member
    Route::post('/dangnhap', [MemberApiController::class, 'postDangNhap'])->name('postDangNhap');
    Route::post('/dangki',[MemberApiController::class, 'register']);

    // product
    Route::get('/product',[ProductApiController::class, 'productHome']);
    Route::get('/product/list',[ProductApiController::class, 'productList']);
    Route::get('/product/detail/{id}',[ProductApiController::class, 'detail']);
    // Route::post('/product/cart',[ProductController::class, 'productCart']);


    //blog list
    Route::get('/bloglist', [BlogApiController::class, 'list'])->name('blog-list');
});
