<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/trainset_management', function () {
    return view('trainset_management');
});

Route::get('/maintenance_plan', function () {
    return view('maintenance_plan');
});

Route::get('/depot_management', function () {
    return view('depot_management');
});

Route::get('/edit_trainset_management', function () {
    return view('edit_trainset_management');
});

Route::get('/edit_maintenance_plan', function () {
    return view('edit_maintenance_plan');
});

Route::get('/edit_depot_management', function () {
    return view('edit_depot_management');
});