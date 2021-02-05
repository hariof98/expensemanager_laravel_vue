<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExpenseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::get('delete/{id}', 'ExpenseController@delete');
Route::get('edit/{id}', 'ExpenseController@edit');

Route::get('register', 'RegisterController@register');
Route::get('login', 'LoginController@login');
Route::get('daybook', 'ExpenseController@daybook');
Route::get('incomerecord', 'IncomeController@incomerecord');
Route::get('expense', 'ExpenseController@daybook');
Route::get('income', 'IncomeController@incomerecord');
Route::get('addexpense', 'ExpenseController@addexpense');
Route::get('addincome', 'IncomeController@addincome');
Route::get('sumsavings', 'IncomeController@sumsavings');

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->middleware('auth:sanctum');
Route::put('update', 'LoginController@update');
Route::put('reset', 'LoginController@reset');

Route::post('expense', 'ExpenseController@expense');
Route::post('addexpense', 'ExpenseController@addexpense');
Route::post('income', 'IncomeController@income');
Route::post('addincome', 'IncomeController@addincome');
Route::post('sumsavings', 'IncomeController@sumsavings');
Route::post('daybook', 'ExpenseController@daybook');
Route::post('incomerecord', 'IncomeController@incomerecord');
Route::post('edit/{id}', 'IncomeController@edit');