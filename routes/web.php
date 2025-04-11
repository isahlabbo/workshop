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


Route::get('/programme/{type}', function () {
    return view('programmes');
})->name('programme');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    
    Route::name('calendar.')
    ->prefix('/calendar')
    ->group(function (){
        Route::get('/', 'CalendarController@index')->name('index');    
        Route::post('/register', 'CalendarController@register')->name('register');    
        Route::post('/{calendarId}/update', 'CalendarController@update')->name('update');    
        Route::get('/{calendarId}/delete', 'CalendarController@delete')->name('delete');        
        Route::get('/{yearId}/synch', 'CalendarController@synch')->name('synch');        
    });

    Route::name('coordinator.')
    ->prefix('/coordinator')
    ->group(function (){
        Route::get('/', 'CoordinatorController@index')->name('index');    
        Route::post('/register', 'CoordinatorController@register')->name('register');    
        Route::post('/{coordinatorId}/update', 'CoordinatorController@update')->name('update');    
        Route::get('/{coordinatorId}/delete', 'CoordinatorController@delete')->name('delete');        
        Route::get('/{yearId}/synch', 'CoordinatorController@synch')->name('synch');        
    });
    
    

    Route::name('facilitator.')
    ->prefix('/facilitator')
    ->group(function (){
        Route::get('/', 'FacilitatorController@index')->name('index');    
        Route::post('/register', 'FacilitatorController@register')->name('register');    
        Route::post('/{facilitatorId}/update', 'FacilitatorController@update')->name('update');    
        Route::get('/{facilitatorId}/delete', 'FacilitatorController@delete')->name('delete');    
                
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
            Route::get('/{workshopId}/delete', 'ScheduleController@delete')->name('delete');    
           
        Route::name('allocation.')
            ->prefix('/allocation')
            ->group(function (){
                Route::get('{scheduleId}/', 'AllocationController@index')->name('index');    
                Route::post('/{workshopId}/register', 'AllocationController@register')->name('register');    
               
                Route::name('question.')
                ->prefix('/question')
                ->group(function (){
                    Route::get('/{allocationId}', 'QuestionController@index')->name('index');    
                    Route::post('/{allocationId}/register', 'QuestionController@register')->name('register');    
                    Route::post('/{questionId}/update', 'QuestionController@update')->name('update');    
                    Route::get('/{questionId}/delete', 'QuestionController@delete')->name('delete');             
            });         
        });            
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
    //    programme workshops
        Route::name('workshop.')
        ->prefix('/workshop')
        ->group(function (){
            Route::get('{programmeId}/', 'WorkshopController@index')->name('index');    
            Route::get('/{workshopId}/view', 'WorkshopController@view')->name('view');    
            Route::post('{programmeId}/register', 'WorkshopController@register')->name('register');    
            Route::post('/{WorkshopId}/update', 'WorkshopController@update')->name('update');    
            Route::get('/{WorkshopId}/delete', 'WorkshopController@delete')->name('delete');        
        });
    // programme bootcamps
        Route::name('bootcamp.')
        ->prefix('/bootcamp')
        ->group(function (){
            Route::get('{programmeId}/', 'BootcampController@index')->name('index');    
            Route::get('/{bootcampId}/view', 'BootcampController@view')->name('view');    
            Route::post('{programmeId}/register', 'BootcampController@register')->name('register');    
            Route::post('/{bootcampId}/update', 'BootcampController@update')->name('update');    
            Route::get('/{bootcampId}/delete', 'BootcampController@delete')->name('delete');        
        });
    
    });
    
    
});