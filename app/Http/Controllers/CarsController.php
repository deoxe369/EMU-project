<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
   public function add(Request $info1)
    {
    	DB::insert('insert into depot (capacity, location_name,location) values (?, ?, ?)', [ $info1->capacity, $info1->location_name,$info1->depotno]);

    	 return Redirect::action('DepotController@depot_info');	
    } 
    
}
