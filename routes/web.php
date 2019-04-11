<?php

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
Route::get('/edit/{id}', 'HomeController@editInfor')->name('edit.infor');
Route::put('/update/{id}', 'HomeController@updateInfor')->name('update.infor');
Route::get('changepassword/{id}', 'HomeController@password')->name('changepassword');
Route::post('/change/{id}', 'HomeController@changePassword')->name('change');

Route::get('purse/show/{id}/', 'PurseController@show')->name('purse');
Route::get('purse/edit/{id}', 'PurseController@edit')->name('purse.edit');
Route::put('purse/update/{id}', 'PurseController@updatePurse')->name('purse.update');
Route::delete('deletepurse/{id}', 'PurseController@destroy');
Route::get('purse/create', 'PurseController@createPurse')->name('purse.create');
Route::post('purse/show/{id}', 'PurseController@store')->name('purse.store');
Route::get('purse/trade/{id}', 'PurseController@trade')->name('purse.trade');
Route::post('purse/send/{id}', 'PurseController@send')->name('purse.send');

Route::get('category/show/{id}', 'CategoryController@show')->name('category.show');
Route::get('category/receipt/{id}', 'CategoryController@showReceipt')->name('category.receipt');
Route::get('category/expense/{id}', 'CategoryController@showExpense')->name('category.expense');
Route::get('category/create', 'CategoryController@createCategory')->name('category.create');
Route::post('category/show/{id}', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('category/update/{id}', 'CategoryController@updateCategory')->name('category.update');
Route::delete('deletecategory/{id}', 'CategoryController@destroy');

Route::get('trade/show/{id}', 'TradeController@show')->name('trade.show');
Route::get('trade/edit/{id}', 'TradeController@edit')->name('trade.edit');
Route::put('trade/update/{id}', 'TradeController@updateTrade')->name('trade.update');
Route::delete('deletetrade/{id}', 'TradeController@destroy');
Route::get('/export/expense/{id}', 'TradeController@exportExpense')->name('export.expense');
Route::get('/export/receipt/{id}', 'TradeController@exportReceipt')->name('export.receipt');

Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');
	