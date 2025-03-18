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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    
    Route::name('business.')
    ->prefix('/business')
    ->group(function (){
        Route::get('/', 'BusinessController@index')->name('index');    
        Route::post('/register', 'BusinessController@register')->name('register');    
        Route::post('/{BusinessId}/update', 'BusinessController@update')->name('update');    
        Route::get('/{BusinessId}/delete', 'BusinessController@delete')->name('delete');        
    });

    
    
});