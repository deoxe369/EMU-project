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
        
        ini_set('max_execution_time', 300);
        $test = array();
        $round = $info->cars_qty;
        // return $round;
        $cars_type = DB::table('part_model')->select('cars_type')->where('model',$info->cars_model)->distinct()->get();

        
    	 for ($x = 0; $x < $round ; $x++){ //วนรถ

        DB::insert('insert into cars (model, cars_type,price,created_at) values (?, ?, ?,?)', [ $info->cars_model,  $cars_type[0]->cars_type,$info->cars_price,Carbon::now()]);
       $cars_id = DB::table('cars')->select('id')->MAX('id');
        	
          
 
                $part_model = DB::table('part_model')->select('part_type','brand','code','quantity')->where('model',$info->cars_model)->get();
                 
                // return count($part_model);

                foreach($part_model as $pm){
                 
                 $part_expired = DB::table('part_type')->select('lifetime_time')->where('part_type', $pm->part_type)->get();
                 $expired_year = Carbon::now()->year + $part_expired[0]->lifetime_time;
                 $month = Carbon::now()->month;
                 $day = Carbon::now()->day;
                 $expired_date = ($expired_year."-".$month."-".$day);
                 // return$pm->quantity;
                 if($pm->quantity == 1){
                    DB::insert('insert into part (part_type,brand,code, manufactured_date,expired_date,total_distance,total_time,cars_id,price,status,created_at) values (?, ?, ?, ?, ? ,? , ? , ? , ? , ? , ?)', [$pm->part_type,$pm->brand,$pm->code,Carbon::now(),$expired_date,0,0,$cars_id,$info->cars_price,"ใช้ได้",Carbon::now()]);
                     
                 }else{
                    for ($x = 0; $x < $pm->quantity ; $x++){
                DB::insert('insert into part (part_type,brand,code, manufactured_date,expired_date,total_distance,total_time,cars_id,price,status,created_at) values (?, ?, ?, ?, ? ,? , ? , ? , ? , ? , ?)', [$pm->part_type,$pm->brand,$pm->code,Carbon::now(),$expired_date,0,0,$cars_id,$info->cars_price,"ใช้ได้",Carbon::now()]);
                        array_push($test,$pm->quantity);
                     }
                 }
                 // 
                }
                // return $test;
        }

    	 return Redirect::action('CarsController@cars_info');	
    	// return $round;

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
        $model = DB::table('part_model')->select('model')->whereNotIN('model',[$origin_info[0]->model])->distinct()->get();
    	// return View::make('edit_car_management', array('origin_info' => $origin_info));
         return View::make('edit_car_management')->with('origin_info',$origin_info)->with('model',$model);
    	
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
            $status = DB::table('cars')->select('train_number')->where('id',$id1)->get();
            
            if($status[0]->train_number == NULL){
                 DB::table('cars')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);

            }else{
                return "ตู้รถไฟ". $id1."ถูกติดตั้งที่ชุดรถไฟ ".$status[0]->train_number." ไม่สามารถลบตู้รถไฟนี้ได้";
            }
           
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
        // return $info;
            $input  = explode('&', $info->server->get('QUERY_STRING'));
            $cars_model = substr($input[0],11);
            $cars_type = substr($input[1],10);
            $all_part_type = array_splice($input,2);
            $part_name = array();
            $brand = array();
            $code = array();
            $qty = array();
            $locomotive = DB::table('part_cars')->where('cars_type',"locomotive")->get();
            $bogie = DB::table('part_cars')->where('cars_type',"bogie")->get();  
            $loco = count($locomotive);
            $bo = count($bogie);

            if($cars_type == "locomotive"){
                $number = (count($all_part_type)/4)-$bo;
                for($i = 0; $i<$number; $i++){
                    $part_name1 = substr($all_part_type[0],10);
                    $brand1 = substr($all_part_type[1],6);
                    $code1 = substr($all_part_type[2],5);
                    $qty1 = (int)substr($all_part_type[3],4);
                         DB::insert('insert into part_model (model,cars_type,part_type,brand,code,quantity,created_at) values (?, ?, ?, ?, ? ,?,? )', [ $cars_model,$cars_type,$part_name1,$brand1,$code1,$qty1,Carbon::now()]);
                    if($i > $loco-1 ){
                        DB::insert('insert into part_type (part_type,lifetime_time,lifetime_distance,created_at) values (?, ?, ?, ?)', [ $part_name1,NULL,NULL,Carbon::now()]);
                        DB::insert('insert into part_cars (cars_type,part_type,created_at) values (?, ?, ?)', [ $cars_type,$part_name1,Carbon::now()]);
                    }
                    array_splice($all_part_type,0,4);
                    if($i == $loco-1){
                        array_splice($all_part_type,0,$bo*4);
                        // return $part_name1;
                    }
                    
                }
            }else if($cars_type == "bogie"){
                $number = (count($all_part_type)/4)-$loco;

                array_splice($all_part_type,0,$loco*4);
                 for($i = 0; $i<$number; $i++){

                    $part_name1 = substr($all_part_type[0],10);
                    $brand1 = substr($all_part_type[1],6);
                    $code1 = substr($all_part_type[2],5);
                    $qty1 = (int)substr($all_part_type[3],4);
                    
                         DB::insert('insert into part_model (model,cars_type,part_type,brand,code,quantity,created_at) values (?, ?, ?, ?, ? ,?,? )', [ $cars_model,$cars_type,$part_name1,$brand1,$code1,$qty1,Carbon::now()]);
                    if($i > $bo-1 ){
                        DB::insert('insert into part_type (part_type,lifetime_time,lifetime_distance,created_at) values (?, ?, ?, ?)', [ $part_name1,NULL,NULL,Carbon::now()]);
                        DB::insert('insert into part_cars (cars_type,part_type,created_at) values (?, ?, ?)', [ $cars_type,$part_name1,Carbon::now()]);
                        
                    }
                    array_splice($all_part_type,0,4);
                    // return$part_name1;
                }
            }
            
            $model = DB::table('part_model')->select('model')->distinct()->get();
          
             
              return View::make('add_car_management')->with('model',$model);
            // return $cars_type;
    }
               
  public function add_car_info(Request $info)

    {           
            $model = DB::table('part_model')->select('model')->distinct()->get();
          
             
              return View::make('add_car_management')->with('model',$model);
       
    }
}