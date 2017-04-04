<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;

class TrainCirculationController extends Controller
{
    public function train_schedule_info()
    {
    	$train_schedule_info = DB::table('train_schedule')->whereNull('deleted_at')->get();
        return View::make('index')->with('train_schedule_info',$train_schedule_info);
       
    }

     public function train_schedule_info1()
    {
    	$time_table_info = DB::table('time_table')->get();
    	$number =  count($time_table_info);
    	$train_set_info = DB::table('train_set')->get();
    	$train_set_location = DB::table('route')->get();
        return View::make('traincirculation_plan')->with('time_table_info',$time_table_info)->with('number',$number)->with('train_set_info',$train_set_info);
       
    }

     public function create_train_schedule()
    {	

    	
    	$time_table_info = DB::table('time_table')->whereNull('deleted_at')->distinct()->get();
    	$train_schedule_info = DB::table('train_schedule')->get();
    	
    	$number = count($time_table_info);
    	
    	$rangee = array();


    	for($i = 0 ; $i < $number ; $i++){
    		$train_set_info = DB::table('train_set')->where('status','ว่าง')->orwhere('status','วิ่ง')->where('mark',NULL)->distinct()->get();
    		$count = count($train_set_info);
			$shortest = array();
			$train_set1 = array();
    		$train_set_distance1 = array();
    		$train_set_number1 = array();
    		$source_distance = DB::table('route')->select('distance')->where('name',$time_table_info[$i]->source_station)->get();
    		$destination_distance = DB::table('route')->select('distance')->where('name',$time_table_info[$i]->destination_station)->get();
    		$range = abs($destination_distance[0]->distance - $source_distance[0]->distance);
    		array_push($rangee,$range);
    		if($range > 0){
    			$range_p = 1; 
    		}else if($range > 260){
    			$range_p = 2; 
    		}else if($range > 488){
    			$range_p = 3;
    		}
    		

    				$maintenance_date = Carbon::now()->format('Y/m/d');
                    $maintenance_date1 = strtotime($maintenance_date);
                    $originDate1 = strtotime('2017/01/1');
                    $datediff = $maintenance_date1  - $originDate1;
                    $day = ($datediff / (60 * 60 * 24));
                    $mod = $day%2;
                            
                    if($mod == 0){
                       $location = $source_distance[0]->distance;
                       
                    }else{
                       $location = $destination_distance[0]->distance;
                        
                     }

			for($k = 0 ; $k < $count ; $k++){ //train set
    			$shortest_index = array();
    			
    			$train_distance = DB::table('route')->select('distance')->where('name',$train_set_info[$k]->location_name)->get();
				$level_distance = DB::table('level')->select('total_distance')->where('level',$train_set_info[$k]->level)->get();
	    		$train_total_distance = DB::table('train_set')->select('total_distance')->where('train_number',$train_set_info[$k]->train_number)->get();	
				$gap =  abs($train_total_distance[0]->total_distance - $level_distance[0]->total_distance);
               
	    			foreach($train_distance as $train_d){
	    			
		    			if($gap > $range*4){
		    				$distance = abs($train_d->distance - $location);
		    				array_push($train_set1,$train_set_info[$k]->train_number);
		    				array_push($shortest,$distance);
                            
		    			}
	    			
	    			}	
	    			

     		}

			$min_distance = min($shortest);
			for($z = 0 ; $z < count($shortest) ; $z++){
				 if($shortest[$z] == $min_distance){
					array_push($shortest_index,$z);
				 }
			}
			for($y = 0 ; $y < count($shortest_index) ; $y++){
					$index1 = $shortest_index[$y];
					$train_set_distance = DB::table('train_set')->select('train_number','total_distance')->where('train_number',$train_set1[$index1])->get();
					array_push($train_set_distance1,$train_set_distance[0]->total_distance);
					array_push($train_set_number1,$train_set_distance[0]->train_number);
			}

			if($range_p = 1 ){
				$train_setmin = min($train_set_distance1);
				$train_index = array_search($train_setmin,$train_set_distance1);
				$tain_set_choose =  $train_set_number1[$train_index];

			}else if($range_p = 2 ){
				rsort($train_set_distance1); 
            	$middle = round(count($train_set_distance1)/2); 
                $train_setmedain = $train_set_distance1[$middle-1];
                $train_index = array_search($train_setmedain,$train_set_distance1);
				$tain_set_choose = $train_set_number1[$train_index];

			}else if($range_p = 2 ){
				$train_setmax = max($train_set_distance1);
				$train_index = array_search($train_setmax,$train_set_distance1);
				$tain_set_choose = $train_set_number1[$train_index];
			}	 	
				$train_trip = $i+1;

				// DB::insert('insert into train_schedule (train_trip, train_number,class,source_station,departure_time,destination_station,arrival_time,trip_type,reverse_trip,mark,created_at) values (?, ?, ?, ?, ? ,?,?, ?, ?, ?, ? )', [$train_trip,$tain_set_choose,$time_table_info[$i]->class,$time_table_info[$i]->source_station,$time_table_info[$i]->departure_time,$time_table_info[$i]->destination_station,$time_table_info[$i]->arrival_time,$time_table_info[$i]->trip_type,1,"yes",Carbon::now()]);

				//  DB::table('train_set')->where('train_number',$tain_set_choose)->update(['mark'=>"yes"]);
				
				
		
    	}
    	// ------------------------------------------------------------------------------
    	// foreach($train_set_info as $train){
    	// 	foreach($train_schedule_info as $train1){

    	// 		if($train->train_number == $train1->train_number){
    	// 			 $point = DB::table('route')->select('point')->where('name',$train1->source_station)->get();
    	// 			 DB::table('train_set')->where('train_number',$train->train_number)->update(['location_name'=>$train1->source_station,'location'=>$point[0]->point,'status'=>'วิ่ง']);
    	// 		}

    		
    	// 	}

    	// }
    	// --------------------------------------------------------------------------------

    	$result = DB::table('train_schedule')->where('mark',"yes")->get();
          return View::make('show_traincirculation_plan')->with('plan',$result);
    }
   	                                                       																																																											
    

    public function add_plan()
    {
        DB::table('train_schedule')->where('mark',NULL)->update(['deleted_at'=>Carbon::now()]);
        DB::table('train_schedule')->where('mark','yes')->update(['mark'=>'yes']);

        DB::table('train_set')->where('mark',NULL)->where('status','ว่าง')->orwhere('status','วิ่ง')->update(['status'=>'ว่าง']);
        DB::table('train_set')->where('mark','yes')->update(['status'=>'วิ่ง','mark'=>NULL]);

         $train_schedule_info = DB::table('train_schedule')->whereNull('deleted_at')->get();

        return View::make('index')->with('train_schedule_info',$train_schedule_info);  
    }

    public function add_plan_cancel()
    {
        DB::table('train_schedule')->where('mark','yes')->delete();
         DB::table('train_set')->where('mark',"yes")->update(['mark'=>NULL]);

        $train_schedule_info = DB::table('train_schedule')->whereNull('deleted_at')->get();

        return View::make('index')->with('train_schedule_info',$train_schedule_info);

       }
}
