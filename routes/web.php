
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
Route::get('/', 'TrainCirculationController@train_schedule_info');
// Route::get('/', function () {
//     return view('index');
// });

Route::get('/maintenance_plan','MaintenanceController@maintenance_info1');

Route::get('/maintenance','MaintenanceController@maintenance_info');

Route::get('/trainset_management','TrainSetController@trainset_info');

Route::get('/car_management','CarsController@cars_info');

Route::get('/part_management', 'PartController@part_info');

Route::get('/depot_management','DepotController@depot_info');




/**/




// car----------------------------------------------------------------------------

Route::get('/add_car_management','CarsController@add_car_info');
Route::get('search_cars','CarsController@search');

Route::get('add_cars','CarsController@add');

Route::get('/edit_cars_management/{id}/save','CarsController@update');

Route::get('/edit_cars_management/{id}','CarsController@edit');

Route::get('/delete_cars_management','CarsController@cars_info1');

Route::get('/delete_cars','CarsController@delete');


// Trainset------------------------------------->

Route::get('add_trainset','TrainSetController@add');

Route::get('add_trainset_management','TrainSetController@add_trainset_info');

Route::get('/edit_trainset_management/{id}','TrainSetController@edit');

Route::get('/edit_trainset_management/{id}/save','TrainSetController@update');

Route::get('/delete_trainset_management','TrainSetController@trainset_info1');

Route::get('/delete_trainset','TrainSetController@delete');

Route::get('search_train_set','TrainSetController@search');


// Depot---------------------------------------->

Route::get('add_depot','DepotController@add');

// Route::get('update_depot','DepotController@update');
Route::get('/edit_depot_management/{id}/save','DepotController@update');

Route::get('/add_depot_management', function () {
    return view('add_depot_management');
});
Route::get('/edit_depot_management/{id}','DepotController@edit');

Route::get('/delete_depot_management','DepotController@depot_info1');

Route::get('/delete_depot','DepotController@delete');




// Part---------------------------------------->

Route::get('add_part','PartController@add');

Route::get('search_part','PartController@search');

// Route::get('/add_part_management', function () {
//     return view('add_part_management');

Route::get('/edit_part_management/{id}/save','PartController@update');

Route::get('/edit_part_management/{id}','PartController@edit');
// });
Route::get('/add_part_management','PartController@part_type_info');

Route::get('/delete_part_management','PartController@part_info1');

Route::get('/delete_part','PartController@delete');



// ---------------------------------->เพิ่มข้อมูล part_type

Route::get('/add_part_type', function () {
    return view('add_part_type');
});
Route::get('/add_part_type1', 'PartController@add_part_type');





// Maintenance plan ---------------------------------------->\
Route::get('/add_maintenance_plan','MaintenanceController@add_plan');

Route::get('/add_maintenance_plan/save','MaintenanceController@add_plan1');

Route::get('/add_maintenance_plan/cancel','MaintenanceController@add_plan_cancel');

Route::get('/add_maintenance_plan/show','MaintenanceController@show_maintenance_plan');

Route::get('search_train_set1','MaintenanceController@search');

Route::get('/create_maintenance_plan','MaintenanceController@create_maintenance_plan');

// Maintenance  ---------------------------------------->\

//  Route::get('/add_maintenance', function () {
//     return view('add_maintenance');
// });
 Route::get('/edit_maintenance/{id}/','MaintenanceController@edit');

 Route::get('/edit_maintenance/{id}/save','MaintenanceController@update');

 Route::get('search_maintenance','MaintenanceController@search_maintenance');

 Route::get('/add_maintenance_management', 'MaintenanceController@maintenance_add_info');

 Route::get('add_maintenance','MaintenanceController@add');

 Route::get('checklist_maintenance/{id}' ,'MaintenanceController@checklist_maintenance');

 Route::get('checklist_maintenance/{id}/save','MaintenanceController@checklist_checked');

 Route::get('/delete_maintenance','MaintenanceController@maintenance_info2');

 Route::get('/delete_maintenance1','MaintenanceController@delete');

 Route::get('/choose_cars/{id}' ,'MaintenanceController@choose_car');//id = maintenance id

 Route::get('/check_parts/{mid}/{id}','MaintenanceController@check_parts');

 Route::get('/check_parts/{mid}/{id}/{part}','MaintenanceController@check_editpart');

 Route::get('/check_parts/{mid}/{id}/{part}/save','MaintenanceController@change_part');


 // Route::get('/check_3carparts',function(){
 // 	return view('check_3carparts');
 // });

 // Route::get('/check_4carparts',function(){
 // 	return view('check_4carparts');
 // });
 
 // Route::get('/check_locoparts',function(){
 // 	return view('check_locoparts');
 // });

 // Route::get('/check_bogieparts',function(){
 // 	return view('check_bogieparts');
 // });

 // Route::get('/check_editpart', function(){
 // 	return view('check_editpart');
 // });

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
Route::get('add_checklist1','MaintenanceController@add_checklist');



// ------------------------------------------->TrainCirculation

Route::get('/create_traincirculation_plan', 'TrainCirculationController@create_train_schedule');

Route::get('/traincirculation_plan', 'TrainCirculationController@train_schedule_info1');

Route::get('/traincirculation_plan/save','TrainCirculationController@add_plan');

Route::get('/traincirculation_plan/cancel','TrainCirculationController@add_plan_cancel');

Route::get('/edit_traincirculation/{id}','TrainCirculationController@edit');

Route::get('/edit_traincirculation/{id}/save','TrainCirculationController@update');

Route::get('/traincirculation_plan/{id}', 'TrainCirculationController@add_plan1');

Route::get('/traincirculation_plan_manual/save', 'TrainCirculationController@add_plan2');


// -------------------------------------------Model

Route::get('/add_model', 'CarsController@add_model');

Route::get('/add_model/save', 'CarsController@add_model_save');



