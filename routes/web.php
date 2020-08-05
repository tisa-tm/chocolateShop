<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/order', 'HomeController@store');
Route::get('/createorder', 'HomeController@sendOptions')->name('order');
Route::get('/gotocart/{id}','HomeController@goToCart')->name('gotocart');
Route::post('/addtocart','HomeController@addToCart')->name('addtocart');
Route::get('/removefromcart/{cartid}','HomeController@removeFromCart')->name('removefromcart');
Route::get('/orderfromcart','HomeController@placeOrderFromCart')->name('orderfromcart');
Route::get('/singleorder/{id}','HomeController@sendChocolate');
// Route::get('/cart','HomeController@showCart')->name('showCart');

Route::get('/darkchocolate','WelcomeController@dark')->name('darkchocolate');
Route::get('/whitechocolate','WelcomeController@white')->name('whitechocolate');
Route::get('/milkchocolate','WelcomeController@milk')->name('milkchocolate');

Route::get('/add',function(){
	return view('admin.create');
})->name('add');
Route::post('/addnew','AdminController@store');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::match(['get', 'post'], '/admin', 'AdminController@index');
});

Route::get('/vieworder','AdminController@order')->name('vieworder');
Route::get('/vieworderdetail', 'AdminController@orderdetail')->name('vieworderdetail');
Route::get('/viewchocolate','AdminController@chocolate')->name('viewchocolate');
Route::get('/viewuser','AdminController@user')->name('viewuser');
Route::post('/update/{chocolateid}','AdminController@update');
Route::post('/postupdate/{id}','AdminController@postUpdate');
Route::post('/shipped/{orderid}','AdminController@shipped');