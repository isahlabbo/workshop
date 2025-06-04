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
use App\Models\Certificate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/certificate/{certificateNo}/verify', function ($certificate_no) {
    $certificate = Certificate::where('no',$certificate_no)->first();

    if($certificate){
        return view('verify-cert',['certificate'=>$certificate]);
    }

    return redirect()->back()->withToastWarning('Invalid Certificate Number');
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

    Route::name('coupon.')
    ->prefix('/coupon')
    ->group(function (){
        Route::post('/generate', 'CouponController@generate')->name('generate');    
        Route::post('/check', 'CouponController@check')->name('check');    
        Route::get('/', 'CouponController@index')->name('index');    
        Route::get('/{couponId}/delete', 'CouponController@delete')->name('delete');    
        Route::post('/{couponId}/update', 'CouponController@update')->name('update');    
               
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

    Route::name('participant.')
    ->prefix('/participant')
    ->group(function (){
        Route::get('/', 'ParticipantController@index')->name('index');    
        Route::post('/register', 'ParticipantController@register')->name('register');    
        Route::get('{participantId}/delete', 'ParticipantController@delete')->name('delete');    
        Route::post('{participantId}/update', 'ParticipantController@update')->name('update');    
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

    Route::name('access.')
    ->prefix('/access')
    ->group(function (){
        Route::get('/', 'AccessController@index')->name('index');    
        // Roles management routes
        Route::name('role.')
        ->prefix('/role')
        ->group(function (){
            Route::post('/register', 'Access\RoleController@register')->name('register');    
            Route::post('/{roleId}/update', 'Access\RoleController@update')->name('update');    
            Route::post('/{roleId}/update-permissions', 'Access\RoleController@updatePermission')->name('updatePermission');    
            Route::post('/{userId}/update-user-roles', 'Access\RoleController@updateUserRole')->name('updateUserRole');    
            Route::post('/{userId}/update-user-permissions', 'Access\RoleController@updateUserPermission')->name('updateUserPermission');    
            Route::get('/{roleId}/delete', 'Access\RoleController@delete')->name('delete');    
                    
        });

        // Permission management routes
        Route::name('permission.')
        ->prefix('/permission')
        ->group(function (){
            Route::post('/register', 'Access\PermissionController@register')->name('register');    
            Route::post('/{roleId}/update', 'Access\PermissionController@update')->name('update');    
            Route::get('/{roleId}/delete', 'Access\PermissionController@delete')->name('delete');    
        });
                    
    });

    Route::name('schedule.')
        ->prefix('/schedule')
        ->group(function (){
            Route::get('/', 'ScheduleController@index')->name('index');    
            Route::post('register', 'ScheduleController@register')->name('register');    
            Route::get('/create', 'ScheduleController@create')->name('create');    
            Route::get('/{scheduleId}/view', 'ScheduleController@view')->name('view');    
            Route::get('/certificate/{scheduleId}/publish', 'ScheduleController@publish')->name('publish');    
            Route::get('/{workshopId}/delete', 'ScheduleController@delete')->name('delete');    
           
        Route::name('allocation.')
            ->prefix('/allocation')
            ->group(function (){
                Route::get('{scheduleId}/', 'AllocationController@index')->name('index');    
                Route::post('/schedule/{scheduleId}/workshop/{workshopId}/register', 'AllocationController@register')->name('register');    
               
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
        Route::get('/{applicationId}/re-schedule', 'ApplicationController@schedule')->name('schedule');    
        
        Route::name('certificate.')
        ->prefix('/certificate')
        ->group(function (){
            Route::get('/', 'certificateController@index')->name('index');    
            Route::get('/{applicationId}/view', 'CertificateController@view')->name('view');    
                    
        });
                
    });
    

    Route::name('programme.')
    ->prefix('/programme')
    ->group(function (){
        Route::get('/', 'ProgrammeController@index')->name('index');    
        Route::post('/verify', 'ProgrammeController@verify')->name('verify');    
        Route::post('/register', 'ProgrammeController@register')->name('register');    
        Route::post('/{programmeId}/update', 'ProgrammeController@update')->name('update');    
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
            
            Route::name('topic.')
                ->prefix('/topic')
                ->group(function (){
                    Route::get('{workshopId}/', 'TopicController@index')->name('index');    
                    Route::post('{workshopId}/register', 'TopicController@register')->name('register');    
                    Route::post('{topicId}/update', 'TopicController@update')->name('update');    
                    Route::get('{topicId}/delete', 'TopicController@delete')->name('delete');    

                Route::name('subtopic.')
                    ->prefix('/subtopic')
                    ->group(function (){
                        Route::post('{topicId}/register', 'SubtopicController@register')->name('register');    
                        Route::post('{subtopicId}/update', 'SubtopicController@update')->name('update');    
                        Route::get('{subtopicId}/delete', 'SubtopicController@delete')->name('delete');    
                });

                Route::name('practical.')
                    ->prefix('/practical')
                    ->group(function (){
                        Route::post('{topicId}/register', 'PracticalController@register')->name('register');    
                        Route::post('{practicalId}/update', 'PracticalController@update')->name('update');    
                        Route::get('{practicalId}/delete', 'PracticalController@delete')->name('delete');    
                });
            });
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

            Route::name('project.')
            ->prefix('/project')
            ->group(function (){
                Route::get('{bootcampId}/', 'ProjectController@index')->name('index');    
                Route::post('{bootcampId}/register', 'ProjectController@register')->name('register');    
                Route::post('{projectId}/update', 'ProjectController@update')->name('update');    
                Route::get('{projectId}/delete', 'ProjectController@delete')->name('delete');    

                Route::name('step.')
                ->prefix('/step')
                ->group(function (){
                    Route::post('{projectId}/register', 'ProjectStepController@register')->name('register');    
                    Route::post('{stepId}/update', 'ProjectStepController@update')->name('update');    
                    Route::get('{stepId}/delete', 'ProjectStepController@delete')->name('delete');    
                });

                Route::name('tool.')
                ->prefix('/tool')
                ->group(function (){
                    Route::post('{projectId}/register', 'ProjectToolController@register')->name('register');    
                    Route::post('{toolId}/update', 'ProjectToolController@update')->name('update');    
                    Route::get('{toolId}/delete', 'ProjectToolController@delete')->name('delete');    
                });
            });
        });
    
    });
    
    
});