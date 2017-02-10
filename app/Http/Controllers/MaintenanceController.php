<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;


class MaintenanceController extends Controller
{
    public function maintenance_add_info() 
    {
    	$trian_set_info = DB::table('train_set')->select('train_set_number')->where('status','ว่าง')->get();
    	$depot_info = DB::table('depot')->select('location_name')->where('status','ว่าง')->get();
    	$level_info = DB::table('level')->select('level')->get();
    	 
    	return View::make('add_maintenance_plan')->with('trian_set_info',$trian_set_info)->with('depot_info',$depot_info)->with('level_info',$level_info);

    }
    public function add(Request $info1)
    {
        $depot_id = DB::table('depot')->select('id')->where('location_name',$info1->depot)->get();

    	// DB::insert('insert into maintenance_plan (train_set_id, depot_id,level,in_date,created_at) values (?, ?, ?, ?, ?  )', [ $info1->trainsetno, $depot_id,$info1->level,$info1->in_date,Carbon::now()]);

    	// return Redirect::action('PartController@part_info');	

        return $depot_id;
	    	
	}
	public function maintenance_info()
    {
    	$maintenance_info = DB::table('maintenance_plan')->get();
    	 
    	return View::make('maintenance_plan')->with('maintenance_info',$maintenance_info);
    }




//--------------------------------------------->checklist
    public function add_checklist(Request $info)
    {
       // DB::insert('insert into checklist (checklist,level,created_at) values (?, ?, ? )', [ $info->checklist,$info->level,Carbon::now()]);
         
       //  return View::make('add_checklist');
        return 'kk';
    }
//--------------------------------------------->level
    public function add_level(Request $info)
    {
        DB::insert('insert into level (total_distance,total_time,level,created_at) values (?, ?, ?,? )', [ $info->distance,$info->time,$info->level,Carbon::now()]);
        return View::make('add_level');
    }
}
