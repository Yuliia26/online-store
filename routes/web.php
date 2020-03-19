<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Auth::routes([
//    'confirm' => false,
//    'reset' => false
//]);

Route::get('/logout', "Auth\LoginController@logout")->name('get-logout');

Route::get('/', "MainController@index")->name('index');

Route::get('/basket', "BasketController@basket")->name('basket');

Route::get('/checkout', "BasketController@checkout")->name('checkout');

Route::post('/basket/add/{id}', "BasketController@add")->name('basket-add');

Route::post('/basket/remove/{id}', "BasketController@remove")->name('basket-remove');

Route::post('/checkout', "BasketController@confirm")->name('basket-confirm');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::post('/', "ContactController@mailToAdmin")->name('contact');

Auth::routes();


Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('products', 'ProductController');
    });
});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Person',
    'prefix' => 'person'
], function () {
    Route::get('/orders', 'OrderController@index')->name('person-order');
    Route::get('/messages', 'ChatController@index')->name('messages');
    Route::post('/messages', 'ChatController@send')->name('message-send');
});
