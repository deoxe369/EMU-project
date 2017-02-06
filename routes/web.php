
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

/*Main Page*/
Route::get('/', function () {
    return view('index');
});
Route::get('/maintenance_plan', function () {
    return view('maintenance_plan');
});
Route::get('/trainset_management', function () {
    return view('trainset_management');
});
Route::get('/car_management', function () {
    return view('car_management');
});
Route::get('/part_management', 'PartController@part_info');

Route::get('/depot_management','DepotController@depot_info');


/**/
Route::get('/edit_maintenance_plan', function () {
    return view('edit_maintenance_plan');
});
Route::get('/edit_trainset_management', function () {
    return view('edit_trainset_management');
});
Route::get('/edit_car_management', function () {
    return view('edit_car_management');
});
Route::get('/edit_part_management', function () {
    return view('edit_part_management');
});





// Depot---------------------------------------->

Route::get('add_depot','DepotController@add');

// Route::get('update_depot','DepotController@update');
Route::get('/edit_depot_management/{id}/save','DepotController@update');

Route::get('/add_depot_management', function () {
    return view('add_depot_management');
});
Route::get('/edit_depot_management/{id}','DepotController@edit');



// Part---------------------------------------->

Route::get('add_part','PartController@add');

// Route::get('/add_part_management', function () {
//     return view('add_part_management');
// });
Route::get('/add_part_management','PartController@part_type_info');


// ---------------------------------->เพิ่มข้อมูล part_type

Route::get('/add_part_type', function () {
    return view('addparttype');
});
Route::get('/add_part_type1', 'PartController@add_part_type');