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
    
    Route::name('workshop.')
    ->prefix('/workshop')
    ->group(function (){
        Route::get('/', 'WorkshopController@index')->name('index');    
        Route::get('/{workshopId}/view', 'WorkshopController@view')->name('view');    
        Route::post('/register', 'WorkshopController@register')->name('register');    
        Route::post('/{WorkshopId}/update', 'WorkshopController@update')->name('update');    
        Route::get('/{WorkshopId}/delete', 'WorkshopController@delete')->name('delete');        
    });

    
    
});