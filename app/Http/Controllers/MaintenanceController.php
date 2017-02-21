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
    	$trian_set_info = DB::table('train_set')->select('train_set_number')->where('status','ว่าง')->distinct()->get();
    	$depot_info = DB::table('depot')->select('location_name')->where('status','ว่าง')->get();
    	// $level_info = DB::table('level')->select('level')->get();
    	 
    	return View::make('add_maintenance')->with('trian_set_info',$trian_set_info)->with('depot_info',$depot_info);
        // ->with('level_info',$level_info);

    }
    public function add(Request $info1)
    {
        $depot_id = DB::table('depot')->select('id')->where('location_name',$info1->depotno)->get();

        $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_set_number',$info1->trainsetno)->distinct()->get();
        $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
       foreach ($level_info as $value) {
  
            if($value->total_time > $train_set_info[0]->total_time ) {
                $level = $value->level;
                break;
            }
        }
  

    	DB::insert('insert into maintenance (train_set_id, depot_id,level,in_date,created_at) values (?, ?, ?, ?, ?  )', [ $info1->trainsetno, $depot_id[0]->id,$level,$info1->endate,Carbon::now()]);

        DB::table('train_set')->where('train_set_number',$info1->trainsetno)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);

        $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$info1->depotno)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('location_name',$info1->depotno)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);


    	return Redirect::action('MaintenanceController@maintenance_info');	

        // return $depot_slot1;
	    	
	}
	public function maintenance_info()
    {
    	$maintenance_info = DB::table('maintenance')->get();
    	 
    	return View::make('maintenance')->with('maintenance_info',$maintenance_info);
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




    // --------------------------------------------------------------->
    // --------------------------------------------------------------->

    public function maintenance_info1()
    {
        $trainset_info = DB::table('train_set')->select('train_set_number','type','total_distance','total_time','status')->distinct()->get();

        // $composit_info = DB::table('train_set')->select('train_set_number','type','total_distance','total_time','status')->distinct()->get();
         
         // $trainset_info['composit'] = '';
        return View::make(' maintenance_plan', array('trainset_info' => $trainset_info));
    }

}
