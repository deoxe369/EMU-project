
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

Route::get('/maintenance_plan','MaintenanceController@maintenance_info1');

Route::get('/maintenance','MaintenanceController@maintenance_info');

Route::get('/trainset_management','TrainSetController@trainset_info');

Route::get('/car_management','CarsController@cars_info');

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




// car----------------------------------------------------------------------------

Route::get('/add_car_management', function () {
    return view('add_car_management');
});
Route::get('search_cars','CarsController@search');

Route::get('add_cars','CarsController@add');

Route::get('/edit_cars_management/{id}/save','CarsController@update');

Route::get('/edit_cars_management/{id}','CarsController@edit');




// Trainset------------------------------------->

Route::get('add_trainset','TrainSetController@add');

Route::get('add_trainset_management','TrainSetController@add_trainset_info');

Route::get('/edit_trainset_management/{id}','TrainSetController@edit');



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

Route::get('search_part','PartController@search');

// Route::get('/add_part_management', function () {
//     return view('add_part_management');

Route::get('/edit_part_management/{id}/save','PartController@update');

Route::get('/edit_part_management/{id}','PartController@edit');
// });
Route::get('/add_part_management','PartController@part_type_info');


// ---------------------------------->เพิ่มข้อมูล part_type

Route::get('/add_part_type', function () {
    return view('add_part_type');
});
Route::get('/add_part_type1', 'PartController@add_part_type');





// Maintenance plan ---------------------------------------->\




// Maintenance  ---------------------------------------->\

//  Route::get('/add_maintenance', function () {
//     return view('add_maintenance');
// });

 Route::get('/add_maintenance_management', 'MaintenanceController@maintenance_add_info');

 Route::get('add_maintenance','MaintenanceController@add');
// 
// ---------------------------------->เพิ่มข้อมูล level

Route::get('/add_level', function () {
    return view('add_level');
});
Route::get('/add_level1', 'MaintenanceController@add_level');

// ---------------------------------->เพิ่มข้อมูล checklist

Route::get('/add_checklist', function () {
    return view('add_checklist');
});
Route::post('add_checklist1','MaintenanceController@add_checklist');

