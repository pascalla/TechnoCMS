<?php

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

/* Disable Registration */
Auth::routes(['register' => false]);

/** Language Route **/
Route::get('/lang/{key}', function ($key) {
    session()->put('locale', $key);
    return redirect()->back();
});


/** Backend Routes **/
Route::get('backend', 'DashboardController@index')->name('dashboard.index')->middleware('auth');

Route::resource('backend/subjects', 'SubjectController')->middleware('auth');;
Route::resource('backend/workshops', 'WorkshopController')->except([
    'create', 'show'
])->middleware('auth');;

Route::get('backend/subject/{subject_id}/workshop/create', 'WorkshopController@create')->name('workshops.create')->middleware('auth');;
Route::get('backend/subject/{subject_id}/workshop/{workshop_id}', 'WorkshopController@show')->name('workshops.show')->middleware('auth');;

Route::resource('backend/resources', 'ResourceController')->only([
    'store',
])->middleware('auth');;

Route::get('backend/subject/{subject_id}/workshop/{workshop_id}/resource/create', 'ResourceController@create')->name('resources.create')->middleware('auth');;


/** Frontend Routes **/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/resources', 'PageController@resources')->name('frontend.resources');
Route::get('resources/{id}', 'PageController@resource')->name('frontend.resource');
