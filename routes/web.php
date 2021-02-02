<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/{any}', function() {
       return view('welcome');
})->where('any', '.*');

/*Auth::routes();

Route::get('/{any}', 'AppController@index')->where('any' ,'.*');*/
