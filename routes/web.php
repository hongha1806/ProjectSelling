<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\BlogMemberController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//FRONTEND
Route::group([
    // chỉ vao folder frontend
    'namespace' => 'Frontend'
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('trangchu');
    Route::get('productdetail/{id}', [HomeController::class, 'detail'])->name('productdetail');
    //blog member
    //blog list
    Route::get('/blog-list', [BlogMemberController::class, 'list'])->name('blog-list');
    //blog singer
    Route::get('/blog-detail/{id}', [BlogMemberController::class, 'detail'])->name('blog-detail');
    //blog-rate
    Route::post('/blog-rate', [BlogMemberController::class, 'rate'])->name('blog-rate');
    //blog cmt
    Route::post('/blog-cmt', [BlogMemberController::class, 'cmt'])->name('blog-cmt');
    Route::post('/blog-cmt-reply', [BlogMemberController::class, 'reply'])->name('blog-cmt-reply');
    //cart
    Route::post('/addcart', [CartController::class, 'add'])->name('addcart');
    Route::get('/cart', [CartController::class, 'showcart'])->name('showcart');
    Route::post('/tangcart', [CartController::class, 'tangcart'])->name('tangcart');
    Route::post('/giamcart', [CartController::class, 'giamcart'])->name('giamcart');
    Route::post('/xoacart', [CartController::class, 'xoacart'])->name('xoacart'); 
    //tìm kiếm 
    //name
    Route::post('/searchname', [SearchController::class, 'searchname'])->name('searchname');
    //search
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    //advanced
    Route::get('/advanced', [SearchController::class, 'getadvanced'])->name('advanced');
    Route::post('/advanced', [SearchController::class, 'advanced'])->name('advanced');
    //price
    Route::get('/price', [SearchController::class, 'price'])->name('price');
    //checkout
    Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/sendmail',[CheckoutController::class, 'sendmail'])->name('sendmail');
    Route::post('/dangnhapck',[CheckoutController::class, 'login'])->name('dangnhapck');
    Route::post('/dangkick',[CheckoutController::class, 'register'])->name('dangkick'); 


    // check not login for form login
    Route::group(['middleware' => 'memberNotLogin'], function () {
        //dang ky member
        Route::get('/dangky', [MemberController::class, 'register'])->name('dangky');
        Route::post('/dangky', [MemberController::class, 'postDangKy'])->name('postDangKy');

        //dang nhap member
        Route::get('/dangnhap', [MemberController::class, 'login'])->name('dangnhap');
        Route::post('/dangnhap', [MemberController::class, 'postDangNhap'])->name('postDangNhap');
    });

     // check login 
     Route::group(['middleware' => 'member'], function () {
        //account
        Route::get('/account', [AccountController::class, 'account'])->name('account');
        Route::post('/account', [AccountController::class, 'postAccount'])->name('postAccount');
        //product
        Route::prefix('product')->name('product.')->group(function() {
            Route::get('/list', [ProductController::class, 'myproduct'])->name('list');
            Route::get('/add', [ProductController::class, 'add'])->name('add');
            Route::post('/add', [ProductController::class, 'postAdd'])->name('post-add');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [ProductController::class, 'postEdit'])->name('post-edit');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        });
    
    });

});

//ADMIN
Auth::routes();
//Login manager Route
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth'
], function () {
    Route::get('/',[LoginController::class, 'showLoginForm']);
    Route::get('/login',[LoginController::class, 'showLoginForm']);
    Route::post('/login',[LoginController::class, 'login']);
    Route::get('/logout',[LoginController::class, 'logout']);
});
Route::group([
    'prefix' => 'admin', //add "admin" before link
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function () {
    //dashboard admin
    Route::get('/dashboard', [DashBoardController::class,'index'])->name('dashboard');
    //profile dashboard admin
    Route::get('/profile', [DashBoardController::class, 'profile'])->name('profile');
    Route::post('/updateProfile', [DashBoardController::class, 'updateProfile'])->name('updateProfile');
    //country dashboard admin
    Route::prefix('country')->name('country.')->group(function() {
        Route::get('/list', [CountryController::class, 'country'])->name('list');
        Route::get('/add', [CountryController::class, 'addCountry'])->name('add');
        Route::post('/add', [CountryController::class, 'postAddCountry'])->name('post-add');
        Route::get('/edit/{id}', [CountryController::class, 'editCountry'])->name('edit');
        Route::post('/update', [CountryController::class, 'postEditCountry'])->name('post-edit');
        Route::get('/delete/{id}', [CountryController::class, 'deleteCountry'])->name('delete');
    });
    //blog dashboard admin
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/list', [BlogController::class, 'blog'])->name('list');
        Route::get('/add', [BlogController::class, 'add'])->name('add');
        Route::post('/add', [BlogController::class, 'postAdd'])->name('post-add');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update', [BlogController::class, 'postEdit'])->name('post-edit');
        Route::get('/delete{id}', [BlogController::class, 'delete'])->name('delete');
    });
});




