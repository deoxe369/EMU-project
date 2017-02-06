<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Redirect;

class DepotController extends Controller
{
    public function add(Request $info1)
    {
    	DB::insert('insert into depot (capacity, location_name,location) values (?, ?, ?)', [ $info1->capacity, $info1->location_name,$info1->depotno]);

    	 return Redirect::action('DepotController@depot_info');	
    }

    public function depot_info()
    {
    	$depot_info = DB::table('depot')->get();
    	 
    	return View::make('depot_management', array('depot_info' => $depot_info));
    }

    public function edit($id)
    {
    	$origin_info = DB::table('depot')->where('id',$id)->get();

    	return View::make('edit_depot_management', array('origin_info' => $origin_info));
    	
    }

    public function update(Request $info ,$id)
    {
    	
    	DB::table('depot')->where('id',$id)->update(['location'=>$info->location,'location_name'=>$info->location_name,'capacity'=>$info->capacity]);

    	 return Redirect::action('DepotController@depot_info');	
    	     
	}
}