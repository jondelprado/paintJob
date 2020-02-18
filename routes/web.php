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

Route::get('/new-paint-job', 'ProgressController@home');

Route::resource('/paint-jobs', 'ProgressController');

// AJAX REQUESTS
Route::post('/paint-jobs/performance', 'ProgressController@showPerformance');
Route::post('/paint-jobs/progress', 'ProgressController@refreshProgress');
Route::post('/paint-jobs/queue', 'ProgressController@refreshQueue');
Route::post('/paint-jobs/complete', 'ProgressController@update');
