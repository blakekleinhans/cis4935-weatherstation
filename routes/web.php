<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Dashboard index / homepage route
Route::get('/', 'DashboardController@index');
// Generalized route for sensor dashboard
Route::get('/sensor/{id}', 'DashboardController@sensor');



Route::get('/home', function() {
    return view('home');
});


Route::post('/api', 'APIController@index');
