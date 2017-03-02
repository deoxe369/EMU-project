<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;

class DepotController extends Controller
{
    public function add(Request $info1)
    {
    	 DB::insert('insert into depot (capacity,free_slot, location_name,location,created_at,level) values (?, ?, ?, ?, ? ,?)', [ $info1->capacity,$info1->capacity, $info1->location_name,$info1->depotno,Carbon::now(),$info1->depotlevel]);

    	 return Redirect::action('DepotController@depot_info');	
        // return $info1;
    }

    public function depot_info()
    {
    	$depot_info = DB::table('depot')->whereNull('deleted_at')->paginate(15);
    	 
    	return View::make('depot_management', array('depot_info' => $depot_info));
    }

    public function depot_info1()
    {
        $depot_info = DB::table('depot')->whereNull('deleted_at')->paginate(15);
         
        return View::make('delete_depot_management', array('depot_info' => $depot_info));
    }

    public function edit($id)
    {
    	$origin_info = DB::table('depot')->where('id',$id)->get();

    	return View::make('edit_depot_management', array('origin_info' => $origin_info));
    	
    }

    public function update(Request $info ,$id)
    {
    	
    	DB::table('depot')->where('id',$id)->update(['location'=>$info->location,'location_name'=>$info->location_name,'capacity'=>$info->capacity,'updated_at'=>Carbon::now(),'level'=>$info->depotlevel]);

    	 return Redirect::action('DepotController@depot_info');	
    	     
	}


    public function delete(Request $info)
    {
    
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $all_id = array();

        foreach ($input as $id) {

            $id1 = substr($id,7);
            DB::table('depot')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);
           
        }
        
              return Redirect::action('DepotController@depot_info');
    }
}