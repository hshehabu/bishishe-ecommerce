<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\productControllerCopy;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:cache');

    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/user', ' App\Http\Controllers\productControllerCopy@auth;')->name('user')->middleware('user');
Route::get('/out',function(){
    return view('welcome');
});
Route::middleware(['admin'])->group(function(){
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
    Route::get('pending', 'App\Http\Controllers\AdminController@new_orders');
    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    Route::get('orders',[AdminController::class,'orders']);
    Route::get('completed',[AdminController::class,'completed']);
    Route::put('update-order/{id}',[AdminController::class,'update']);
    Route::get('view/{id}',[AdminController::class,'view']);
    Route::post('update', 'App\Http\Controllers\HomeController@update')->name('update');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting']);
    Route::resource('create','App\Http\Controllers\ProductController');
    Route::get('/earlier', [App\Http\Controllers\ProductsController::class, 'index']);
    Route::get('detail/{id}', [App\Http\Controllers\ProductsController::class, 'detail']);
    Route::get('add_sales',[App\Http\Controllers\SalesController::class,'add_sales']);
    Route::get('post-view/{id}',[ProductsController::class, 'view'])->name('postview');
    Route::delete('remove_item/{id}','App\Http\Controllers\ProductController@destroy')->name('remove');
    Route::get('edit_item/{id}','App\Http\Controllers\ProductController@edit');
    Route::post('update_item/{id}','App\Http\Controllers\ProductController@update');
    Route::post('sales', 'App\Http\Controllers\SalesController@sales')->name('add-sales');
    Route::get('/manage', 'App\Http\Controllers\SalesController@manage');
    Route::delete('remove/{id}','App\Http\Controllers\SalesController@destroy')->name('remove');
    Route::get('edit/{id}','App\Http\Controllers\SalesController@edit');
    Route::post('update/{id}','App\Http\Controllers\SalesController@update');
    

});
Route::middleware(['sales'])->group(function(){
    Route::get('/sales', 'App\Http\Controllers\SalesController@index')->name('sales');
    Route::get('/dash', 'App\Http\Controllers\SalesController@home');

    Route::get('/new_orders','App\Http\Controllers\SalesController@new_orders');
    Route::post("delivered/{id}",[SalesController::class,'delivered']);
    Route::post('delivered', 'App\Http\Controllers\SalesController@delivered')->name('delivered');
    // Route::get('delivered',[App\Http\Controllers\SalesController::class,'paid'])->name('delivered');
    Route::get('new',[App\Http\Controllers\SalesController::class,'new'])->name('new');
    Route::get('done',[App\Http\Controllers\SalesController::class,'done'])->name('done');
   
    Route::post("done/{id}",[SalesController::class,'done']);
    Route::get('/logout',function(){
        return view('welcome');
});
});

Route::get('/log', function () {
    return view('login');

});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/log');

});
Route::view('reg','registercopy');
// Route
Route::post("log",[UserController::class,'log']);
Route::post("reg",[UserController::class,'reg']);
Route::get('super', function () {
    return view('super');
});
Route::get("/",[ProductControllerCopy::class,'index']);
Route::get("/category",[ProductControllerCopy::class,'category']);
Route::get("product/{id}",[ProductControllerCopy::class,'detail']);
Route::get("search",[ProductControllerCopy::class,'search']);
Route::post("add_to_cart",[ProductControllerCopy::class,'addToCart']);
Route::get("cartlist",[ProductControllerCopy::class,'CartList']);
Route::get("removecart/{id}",[ProductControllerCopy::class,'removeCart']);
Route::get("ordernow",[ProductControllerCopy::class,'orderNow']);
Route::post("orderplace",[ProductControllerCopy::class,'orderPlace']);
Route::get("myorders",[ProductControllerCopy::class,'myOrders']);
Route::post('update-cart', [ProductControllerCopy::class,'updatecart']);
Route::get("view-order/{id}",[productControllerCopy::class,'view']);
Route::get('search', [productControllerCopy::class, 'search']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/redirect',[App\Http\Controllers\HomeController::class,"redirect"]);






