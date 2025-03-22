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

    Route::name('payment.')
        ->prefix('/payment')
        ->group(function (){
            Route::get('/', 'PaymentController@index')->name('index');    
            Route::post('/authorize', 'PaymentController@authorizePayment')->name('authorize');    
            Route::get('/{applicationId}/collback', 'PaymentController@callback')->name('callback');    
                    
    });

    Route::name('schedule.')
        ->prefix('/schedule')
        ->group(function (){
            Route::get('/', 'ScheduleController@index')->name('index');    
            Route::post('/{workshopId}/register', 'ScheduleController@register')->name('register');    
            Route::get('/{workshopId}/create', 'ScheduleController@create')->name('create');    
                    
    });

    Route::name('centre.')
        ->prefix('/centre')
        ->group(function (){
            Route::get('/', 'CentreController@index')->name('index');    
            Route::post('/register', 'CentreController@register')->name('register');    
            Route::post('/{centreId}/update', 'CentreController@update')->name('update');    
            Route::get('/{centreId}/delete', 'CentreController@delete')->name('delete');    
    });

    Route::name('application.')
    ->prefix('/application')
    ->group(function (){
        Route::get('/', 'ApplicationController@index')->name('index');    
                
});
    

    Route::name('programme.')
    ->prefix('/programme')
    ->group(function (){
        Route::get('/', 'ProgrammeController@index')->name('index');    
        Route::post('/verify', 'ProgrammeController@verify')->name('verify');    
        Route::post('/register', 'ProgrammeController@register')->name('register');    
        Route::get('/{programmeId}/workshops', 'ProgrammeController@workshops')->name('workshops');    
        Route::get('/{programmeId}/delete', 'ProgrammeController@delete')->name('delete');        
    });
    
    
});