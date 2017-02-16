<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;

class TrainSetController extends Controller
{
    public function add(Request $info)
    {
        if( $info->trtype == 'trcar3'){
    	DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar3_1,Carbon::now()]);
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar3_2,Carbon::now()]);
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar3_3,Carbon::now()]);

        DB::table('cars')->where('id',$info->comtrcar3_1)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar3_2)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar3_3)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);

    	return Redirect::action('TrainSetController@trainset_info');
        // return '1';
        }
        if( $info->trtype == 'trcar4'){
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar4_1,Carbon::now()]);
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar4_2,Carbon::now()]);
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar4_3,Carbon::now()]);
        DB::insert('insert into train_set(type, train_set_number,cars_id,created_at) value(?, ?,?,?)', [$info->trtype, $info->trainsetno,$info->comtrcar4_4,Carbon::now()]);

        DB::table('cars')->where('id',$info->comtrcar4_1)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar4_2)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar4_3)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
         DB::table('cars')->where('id',$info->comtrcar4_4)->update(['status'=>'ไม่ว่าง','updated_at'=>Carbon::now()]);
        return Redirect::action('TrainSetController@trainset_info');
        // return '2';
        }
        // if( $info->trtype == 'trgoods'){

        // return '3';
        // }
        // if( $info->trtype == 'trtrolley'){

        // return '4';
        // }
    }

     public function trainset_info()
    {
    	$trainset_info = DB::table('train_set')->select('train_set_number','type','total_distance','total_time','status')->distinct()->get();

        // $composit_info = DB::table('train_set')->select('train_set_number','type','total_distance','total_time','status')->distinct()->get();
    	 
         // $trainset_info['composit'] = '';
    	return View::make('trainset_management', array('trainset_info' => $trainset_info));

       
        
    }

     public function add_trainset_info()
    {
        $cars_loco_info = DB::table('cars')->where('cars_type','locomotive')->where('status','ว่าง')->get();
        $cars_bogie_info = DB::table('cars')->where('cars_type','bogie')->where('status','ว่าง')->get();

       
       // return ($cars_bogie_info.'and'. $cars_loco_info);
        return View::make('add_trainset_management')->with('cars_loco_info' ,$cars_loco_info)->with('cars_bogie_info' ,$cars_bogie_info);
    }

     public function edit($id)
    {
        $origin_info = DB::table('train_set')->where('train_set_number',$id)->get();

        $cars_loco_info = DB::table('cars')->where('cars_type','locomotive')->where('status','ว่าง')->get();
        $cars_bogie_info = DB::table('cars')->where('cars_type','bogie')->where('status','ว่าง')->get();


        // $part_type_info = DB::table('part_type')->select('id','part_type')->get();  

        return View::make('edit_trainset_management')->with('cars_loco_info' ,$cars_loco_info)->with('cars_bogie_info' ,$cars_bogie_info)->with('origin_info' ,$origin_info);
        // , array('origin_info' => $origin_info), array('part_type_info' => $part_type_info));
        // return $origin_info;

        
    }
}
