<?php
    use Illuminate\Support\Facades\Route;
   
    Route::prefix('Dashboard')->name('dashboard.')->middleware(['auth'])
    ->group(function()
    {
        Route::resource('/users','UserController');
        Route::get('/members','MemberController@index');
        Route::get('/member/approve/{user_id}','MemberController@approve')->name('memebr.approve');
        Route::get('/member/inactive/{user_id}', 'MemberController@Inactive')->name('member.inactive');
        Route::delete('/member/delete/{user_id}', 'MemberController@delete')->name('member.delete');
        Route::resource('/projects','ProjectController');
        Route::resource('/States','GovernorateController');
        Route::resource('/services','ServiceController');
        Route::resource('/types','TypeController');
        Route::resource('/status','StatusController');
        Route::resource('/settings','SettingController'); 
        Route::resource('/projectsRequests','projectsRequestsController'); 
        Route::resource('/projectsNews','NewController'); 
        
    }); //end of dashboard routes 
