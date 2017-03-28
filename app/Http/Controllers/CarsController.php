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
        $round = $info->cars_qty;
    	 for ($x = 0; $x < $round ; $x++){

        DB::insert('insert into cars (model, cars_type,price,created_at) values (?, ?, ?,?)', [ $info->cars_model, $info->cars_type,$info->cars_price,Carbon::now()]);
       $cars_id = DB::table('cars')->select('id')->MAX('id');
        	
            if($info->cars_type == "locomotive"){
 
                $part_cars = DB::table('part_cars')->select('part_type','brand')->where('cars_type',"locomotive")->get();

                foreach($part_cars as $info1){
                 
                 $part_expired = DB::table('part_type')->select('lifetime_time')->where('part_type',$info1->part_type)->get();
                 $expired_year = Carbon::now()->year + $part_expired[0]->lifetime_time;
                 $month = Carbon::now()->month;
                 $day = Carbon::now()->day;
                 $expired_date = ($expired_year."-".$month."-".$day);
                    
                DB::insert('insert into part (part_type, manufactured_date,expired_date,brand,price,created_at,cars_id) values (?, ?, ?, ?, ? ,? , ? )', [ $info1->part_type, Carbon::now(),$expired_date,$info1->brand,0,Carbon::now(),$cars_id]);

                }

            }else if($info->cars_type == "bogie"){
                 $part_cars = DB::table('part_cars')->select('part_type','brand')->where('cars_type',"bogie")->get();

                foreach($part_cars as $info1){
                 
                 $part_expired = DB::table('part_type')->select('lifetime_time')->where('part_type',$info1->part_type)->get();
                 $expired_year = Carbon::now()->year + $part_expired[0]->lifetime_time;
                 $month = Carbon::now()->month;
                 $day = Carbon::now()->day;
                 $expired_date = ($expired_year."-".$month."-".$day);
                    
                DB::insert('insert into part (part_type, manufactured_date,expired_date,brand,price,created_at,cars_id) values (?, ?, ?, ?, ? ,?,? )', [ $info1->part_type, Carbon::now(),$expired_date,$info1->brand,0,Carbon::now(),$cars_id]);

                }

            }
        }

    	 return Redirect::action('CarsController@cars_info');	
    	// return $info->cars_model;

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

     public function add_model(Request $info)
    {
            $locomotive = DB::table('part_cars')->where('cars_type',"locomotive")->get();
            $bogie = DB::table('part_cars')->where('cars_type',"bogie")->get();  
             
              return View::make('car_model')->with('locomotive',$locomotive)->with('bogie', $bogie);
       
    }

    public function add_model_save(Request $info)
    {           
            $input  = explode('&', $info->server->get('QUERY_STRING'));
            $cars_model = substr($input[0],11);
            $cars_type = substr($input[1],10);
            $all_part_type = array_splice($input,2);
            $number = count($all_part_type)/4;
            $part_name = array();
            $brand = array();
            $code = array();
            $qty = array();
            for($i = 0; $i<$number; $i++){
                $part_name1 = substr($all_part_type[0],10);
                $brand1 = substr($all_part_type[1],6);
                $code1 = substr($all_part_type[2],5);
                $qty1 = substr($all_part_type[3],4);
                // array_push($part_name,$part_name1);
                // array_push($brand,$brand1);
                // array_push($code,$code1);
                // array_push($qty,$qty1);
                     DB::insert('insert into part_model (model,cars_type,part_type,brand,code,quantity,created_at) values (?, ?, ?, ?, ? ,?,? )', [ $cars_model, $cars_type,$part_name1,$brand1 ,$code1,$qty,Carbon::now()]);

                array_splice($all_part_type,0,4);
                
            }
           return View::make('add_car_management');
    }
               

}