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
    	$trian_set_info = DB::table('train_set')->select('train_number')->where('status','ว่าง')->distinct()->get();
    	$depot_info = DB::table('depot')->select('location_name')->where('status','ว่าง')->get();
    	// $level_info = DB::table('level')->select('level')->get();
    	 
    	return View::make('add_maintenance')->with('trian_set_info',$trian_set_info)->with('depot_info',$depot_info);
        // ->with('level_info',$level_info);

    }
    public function add(Request $info1)
    {
        // $depot_id = DB::table('depot')->select('id')->where('location_name',$info1->depotno)->get();

        $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_number',$info1->trainsetno)->distinct()->get();
        $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
       foreach ($level_info as $value) {
  
            if($value->total_time > $train_set_info[0]->total_time ) {
                $level = $value->level;
                break; 
            }
        }
  

    	DB::insert('insert into maintenance (train_set_id, depot,level,in_date,created_at) values (?, ?, ?, ?, ?  )', [ $info1->trainsetno,$info1->depotno,$level,$info1->endate,Carbon::now()]);

        DB::table('train_set')->where('train_number',$info1->trainsetno)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);

        $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$info1->depotno)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('location_name',$info1->depotno)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);


    	return Redirect::action('MaintenanceController@maintenance_info');	
// return $level;
       
	    	
	}
	public function maintenance_info()
    {
    	$maintenance_info = DB::table('maintenance')->whereNull('deleted_at')->get();
    	 
    	return View::make('maintenance')->with('maintenance_info',$maintenance_info);
    }


    public function edit($id) 
    {
        $origin_info = DB::table('maintenance')->where('id',$id)->get();
        
        $trian_set_info = DB::table('train_set')->select('train_number')->where('status','ว่าง')->distinct()->get();
        $depot_info = DB::table('depot')->select('location_name')->where('status','ว่าง')->get();


       return View::make('edit_maintenance')->with('trian_set_info',$trian_set_info)->with('depot_info',$depot_info)->with('origin_info',$origin_info);
       //  // ->with('level_info',$level_info);

        return $origin_info[0]->id;

    }

    public function update(Request $info ,$id) 
    {
        $origin_info = DB::table('maintenance')->where('id',$id)->get();
        
        DB::table('train_set')->where('train_number',$origin_info[0]->train_set_id)->update(['status'=>'ว่าง','updated_at'=>Carbon::now()]);

          $origin_depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$origin_info[0]->depot)->get();

          $origin_depot_slot1 = $origin_depot_slot[0]->free_slot +1;

          DB::table('depot')->where('location_name',$origin_info[0]->depot)->update(['free_slot'=>$origin_depot_slot1,'updated_at'=>Carbon::now()]);
     

        $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_number',$info->trainsetno)->distinct()->get();
        $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
       foreach ($level_info as $value) {
  
            if($value->total_time > $train_set_info[0]->total_time ) {
                $level = $value->level;
                break; 
            }
        }

        DB::table('maintenance')->where('id',$id)->update(['train_set_id'=>$info->trainsetno,'depot'=>$info->depotno,'level'=>$level,'in_date'=>$info->endate,'updated_at'=>Carbon::now()]);

         DB::table('train_set')->where('train_number',$info->trainsetno)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);

         $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$info->depotno)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('location_name',$info->depotno)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);


       return Redirect::action('MaintenanceController@maintenance_info');   
        // return $origin_info[0]->depot;

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



    // maintenance plan

    // --------------------------------------------------------------->
    // --------------------------------------------------------------->

    public function maintenance_info1()
    {
        $trainset_info = DB::table('train_set')->select('train_number','type','total_distance','total_time','status')->where('status','ว่าง')->distinct()->get();

        // $composit_info = DB::table('train_set')->select('train_number','type','total_distance','total_time','status')->distinct()->get();
         
         // $trainset_info['composit'] = '';
        return View::make(' maintenance_plan', array('trainset_info' => $trainset_info));
        // return  $trainset_info;
    }

    public function add_plan(Request $info)
    {
        
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $trainset_info = array();

        foreach ($input as $id) {

            $id1 = substr($id,7);
            $trainset_info1 = DB::table('train_set')->where('train_number',$id1)->distinct()->get();
            array_push($trainset_info,$trainset_info1[0]);
        }
        
         $depot_info = DB::table('depot')->where('free_slot','>',0)->get();   


        return View::make(' add_maintenance_plan')->with('trainset_info',$trainset_info)->with('depot_info',$depot_info);
        // return $trainset_info;
       
            
    }

public function add_plan1(Request $info )
    {
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $trainset_info = array();
        $round = count($input)/3;
        
    
        for ($x = 1; $x <= $round ; $x++) {

            $info1 = substr($input[0],11);
            $info2 = substr($input[1],8);
            $info3 = substr($input[2],9);

            $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_number',$info1)->distinct()->get();
        $level_info = DB::table('level')->orderBy('level', 'asc')->get();
         $depot_name = DB::table('depot')->select('location_name')->where('id',$info2)->get();
       
       foreach ($level_info as $value) {
  
            if($value->total_time > $train_set_info[0]->total_time ) {
                $level = $value->level;
                break; 
            }
        }

        DB::insert('insert into maintenance (train_set_id, depot,level,in_date,created_at) values (?, ?, ?, ?, ?  )', [ $info1,$depot_name[0]->location_name,$level,$info3,Carbon::now()]);

        DB::table('train_set')->where('train_number',$info1)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);

        $depot_slot = DB::table('depot')->select('free_slot')->where('id',$info2)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('id',$info2)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);

            array_splice($input, 0, 3);
        }

       // return   $round;
        return Redirect::action('MaintenanceController@maintenance_info1'); 
            
    }

}
