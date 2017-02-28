<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;

class CarsController extends Controller
{
   public function add(Request $info)
    {
    	 for ($x = 1; $x <= $info->cars_qty ; $x++) {
    	DB::insert('insert into cars (model, cars_type,price,created_at) values (?, ?, ?,?)', [ $info->cars_model, $info->cars_type,$info->cars_price,Carbon::now()]);
    	}
    	 return Redirect::action('CarsController@cars_info');	
    	// return $info;
    } 
    public function cars_info()
    {
    	$cars_info = DB::table('cars')->whereNull('deleted_at')->paginate(15);;

        // $cars_type_info = DB::table('cars')->select('cars_type')->get();

        $cars_model_info = DB::table('cars')->select('model')->distinct()->get();

        $cars_status_info = DB::table('cars')->select('status')->distinct()->get();
    	 
    	return View::make('car_management')->with('cars_info',$cars_info)->with('cars_model_info',$cars_model_info)->with('cars_status_info',$cars_status_info);
    //     return $cars_cars_info;
    }

    public function cars_info1()
    {
        $cars_info = DB::table('cars')->whereNull('deleted_at')->paginate(15);;

        // $cars_type_info = DB::table('cars')->select('cars_type')->get();

        $cars_model_info = DB::table('cars')->select('model')->distinct()->get();

        $cars_status_info = DB::table('cars')->select('status')->distinct()->get();
         
        return View::make('delete_car_management')->with('cars_info',$cars_info)->with('cars_model_info',$cars_model_info)->with('cars_status_info',$cars_status_info);
    //     return $cars_cars_info;
    }

    
    public function edit($id)
    {
    	$origin_info = DB::table('cars')->where('id',$id)->get();

    	return View::make('edit_car_management', array('origin_info' => $origin_info));
    	
    }

    public function update(Request $info ,$id)
    {
    	
    	DB::table('cars')->where('id',$id)->update(['model'=>$info->cars_model,'cars_type'=>$info->cars_type,'price'=>$info->cars_price,'updated_at'=>Carbon::now()]);

    	 return Redirect::action('CarsController@cars_info');	
    	     
	}
	//---------------------------------------------search cars
    public function search(Request $info)
    {
        if($info->cars_model == 'not' && $info->cars_type == 'not' && $info->status == 'not'){
            // DB::table('cars')->where('cars_type',$info->cars_type)->where('model',$info->cars_model)->where('status',$info->status)->get();
            $cars_info = DB::table('cars')->paginate(15);
            // return $cars_info;
        }elseif($info->cars_model == 'not' && $info->cars_type == 'not'){
             $cars_info =DB::table('cars')->where('status',$info->status)->paginate(15);
            // return $cars_info;
        }elseif($info->cars_type == 'not' && $info->status == 'not'){
             $cars_info =DB::table('cars')->where('model',$info->cars_model)->paginate(15);
            // return $cars_info;
        }elseif($info->cars_model == 'not' && $info->status == 'not'){
            $cars_info = DB::table('cars')->where('cars_type',$info->cars_type)->paginate(15);
            // return $cars_info;
        }elseif($info->status == 'not'){
             $cars_info =DB::table('cars')->where('cars_type',$info->cars_type)->where('model',$info->cars_model)->paginate(15);
            // return $cars_info;
        }elseif($info->cars_model == 'not'){
            $cars_info = DB::table('cars')->where('cars_type',$info->cars_type)->where('status',$info->status)->paginate(15);
            // return $cars_info;
        }elseif($info->cars_type == 'not'){
            $cars_info = DB::table('cars')->where('model',$info->cars_model)->where('status',$info->status)->paginate(15);
            // return $cars_info;
        }else{
            $cars_info = DB::table('cars')->where('model',$info->cars_model)->where('status',$info->status)->where('cars_type',$info->cars_type)->paginate(15);
        }
   


        $cars_model_info = DB::table('cars')->select('model')->distinct()->get();

        $cars_status_info = DB::table('cars')->select('status')->distinct()->get();
         
        return View::make('car_management')
        ->with('cars_info',$cars_info->setPath('search_cars?cars_type='.$info->cars_type.'&cars_model='.$info->cars_model.'&status='.$info->status))
        ->with('cars_model_info',$cars_model_info)->with('cars_status_info',$cars_status_info);
    }

     public function delete(Request $info)
    {
    
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $all_id = array();

        foreach ($input as $id) {

            $id1 = substr($id,7);
            DB::table('cars')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);
           
        }
        
              return Redirect::action('CarsController@cars_info');
    }
}