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

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/autenticar', 'Auth\LoginController@authenticate')->name('authenticate');
Route::post('/sair', 'Auth\LoginController@logout')->name('logout');

Route::get('/criar-conta', 'UserController@create')->name('create.account');
Route::post('/criar-conta', 'UserController@store')->name('store.account');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::get('/', 'AccountsController@index')->name('account');
    Route::get('grafico', 'AccountsController@chart')->name('account.charts');
    Route::get('dados/grafico', 'AccountsController@dataChart');

    Route::get('minhas-transacoes', 'TransactionsController@index')->name('transactions');
    Route::get('nova/transacao', 'TransactionsController@create')->name('transaction.create');
    Route::post('transacao', 'TransactionsController@store')->name('transaction.store');

});
