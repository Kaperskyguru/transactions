<?php
use App\Transaction;
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

Route::get('/add', 'TransactionsController@index')->name('add');

Route::post('/add', 'TransactionsController@store')->name('add');

Route::get('/success', 'HomeController@successTransaction')->middleware('verified')->name('successfulTransaction');
Route::get('/pending', 'HomeController@pendingTransaction')->middleware('verified')->name('pendingTransaction');
Route::get('/users', 'HomeController@users')->middleware('verified')->name('users');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
