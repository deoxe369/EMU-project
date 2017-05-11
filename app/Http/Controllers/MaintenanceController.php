<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;
use object;
use stdClass;



class MaintenanceController extends Controller
{
    public function maintenance_add_info() 
    {
    	$trian_set_info = DB::table('train_set')->select('train_number')->where('status','ว่าง')->orwhere('status','วิ่ง')->distinct()->get();
    	$depot_info = DB::table('depot')->select('location_name')->where('free_slot','!=' ,0)->get();
    	
    	 
    	return View::make('add_maintenance')->with('trian_set_info',$trian_set_info)->with('depot_info',$depot_info);
       

    }
    public function add(Request $info1)
    {
       
        $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_number',$info1->trainsetno)->distinct()->get();
        $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
       foreach ($level_info as $value) {
  
            if($value->total_time > $train_set_info[0]->total_time ) {
                $level = $value->level;
                break; 
            }
        }
  

    	DB::insert('insert into maintenance (train_number, depot,level,in_date,created_at) values (?, ?, ?, ?, ?  )', [ $info1->trainsetno,$info1->depotno,$level,$info1->endate,Carbon::now()]);

        DB::table('train_set')->where('train_number',$info1->trainsetno)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);

        $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$info1->depotno)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('location_name',$info1->depotno)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);


    	return Redirect::action('MaintenanceController@maintenance_info');	

       
	    	
	}
	public function maintenance_info()
    {
    	$maintenance_info = DB::table('maintenance')->where('out_date',NULL)->whereNull('deleted_at')->paginate(15);

        $today = Carbon::now();
        
        $train_number =  DB::table('maintenance')->select('train_number')->where('in_date',$today->toDateString())->whereNull('deleted_at')->get();
    	

        foreach ($train_number as $value) {
            DB::table('train_set')->where('train_number',$value->train_number)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);   
            
        }
    	return View::make('maintenance')->with('maintenance_info',$maintenance_info);
        
    }


    public function edit($id) 
    {
        $origin_info = DB::table('maintenance')->where('id',$id)->get();
       
        
        // $trian_set_info = DB::table('train_set')->select('train_number')->where('status','ว่าง')->distinct()->get();
        $depot_info = DB::table('depot')->select('location_name')->where('level','<=',$origin_info[0]->level)->where('status','ว่าง')->get();
 		

       return View::make('edit_maintenance')->with('depot_info',$depot_info)->with('origin_info',$origin_info);
       
        

    }

    public function update(Request $info ,$id) 
    {
        $origin_info = DB::table('maintenance')->where('id',$id)->get();
        
        // DB::table('train_set')->where('train_number',$origin_info[0]->train_number)->update(['status'=>'ว่าง','updated_at'=>Carbon::now()]);

          $origin_depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$origin_info[0]->depot)->get();

          $origin_depot_slot1 = $origin_depot_slot[0]->free_slot +1;

          DB::table('depot')->where('location_name',$origin_info[0]->depot)->update(['free_slot'=>$origin_depot_slot1,'updated_at'=>Carbon::now()]);
     

        // $train_set_info = DB::table('train_set')->select('total_distance','total_time')->where('train_number',$info->trainsetno)->distinct()->get();
       //  $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
       // foreach ($level_info as $value) {
  
       //      if($value->total_time > $train_set_info[0]->total_time ) {
       //          $level = $value->level;
       //          break; 
       //      }
       //  }

        DB::table('maintenance')->where('id',$id)->update(['depot'=>$info->depotno,'in_date'=>$info->endate,'updated_at'=>Carbon::now()]);

         // DB::table('train_set')->where('train_number',$info->trainsetno)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);

         $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$info->depotno)->get();

        $depot_slot1 = $depot_slot[0]->free_slot -1;

        DB::table('depot')->where('location_name',$info->depotno)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);


       return Redirect::action('MaintenanceController@maintenance_info');   
        
        
    }


//--------------------------------------------->checklist
    public function add_checklist(Request $info)
    {
       DB::insert('insert into checklist (checklist,level,created_at) values (?, ?, ? )', [ $info->checklist,$info->level,Carbon::now()]);
         
        return View::make('add_checklist');
       
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
       
        $trainset_maintenance = DB::table('maintenance')->select('train_number')->distinct()->get();
        $number = count($trainset_maintenance);
        $trainset_level_info = DB::table('train_set')->select('train_number','total_distance','total_time')->where('status','วิ่ง')->orwhere('status','ว่าง')->distinct()->get();
        // return $trainset_level_info;
        $level_info = DB::table('level')->select('level','total_time','total_distance')->orderBy('level', 'asc')->get();

            foreach ($trainset_level_info as $x) {
                // if($x == NULL){
                   foreach ($level_info as $value) {
              
                        if($value->total_time >= $x->total_time and $value->total_distance >= $x->total_distance) {
                            $level = $value->level;
                            DB::table('train_set')->where('train_number',$x->train_number)->update(['level'=>$level,'updated_at'=>Carbon::now()]);
                            break; 
                            
                        }
                       
                    }
               
                
            }

        $today = Carbon::now(); 
        $train_number =  DB::table('maintenance')->where('in_date',$today->toDateString())->whereNull('deleted_at')->whereNull('stay')->get();
        

        foreach ($train_number as $value) {
            DB::table('maintenance')->where('id',$value->id)->update(['stay'=>'yes']);
            DB::table('train_set')->where('train_number',$value->train_number)->update(['status'=>'ซ่อม','updated_at'=>Carbon::now()]);
            $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$value->depot)->get();

            $depot_slot1 = $depot_slot[0]->free_slot -1;

            DB::table('depot')->where('location_name', $value->depot)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);
   
            
        }

        $trainset_info = DB::table('train_set')->where('status','ว่าง')->orwhere('status','วิ่ง')->distinct()->paginate(15);

        return View::make('maintenance_plan')->with('trainset_info', $trainset_info)->with('trainset_maintenance',$trainset_maintenance)->with('number',$number)->with('level_info',$level_info);


        
    }

    public function add_plan(Request $info)
    {
        
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $trainset_info = array();
        $trainset_level_info = array();
        $level_info1 = array();
        $level_info2 = array();
        $trainset_number1 = array();
        $level_distance = array();
        $trainset_distance = array();
        $balance_distance = array();
        $train_schedule = array();
        $source_station = array();
        $destination_station = array();
        $maintenance_date1 = array();

        foreach ($input as $id) {//ตามชุดรถไฟ

            $id1 = substr($id,7);

            $trainset_info2 = DB::table('train_set')->select('train_number','total_distance','total_time','location_name')->where('train_number',$id1)->distinct()->get();
            $trainschedule = DB::table('train_schedule')->select('source_station','destination_station')->where('train_number',$id1)->whereNull('deleted_at')->get();
            $location_name = DB::table('train_schedule')->select('source_station','destination_station')->where('train_number',$id1)->get();

            if(count($trainschedule) == 0){
                // return 1;
                $free_train_location = $trainset_info2[0]->location_name;
                 $object = (object) ['source_station' => $free_train_location,'destination_station' => $free_train_location];
                
                    array_push($trainset_number1,$id1);
                    array_push($trainset_level_info,$trainset_info2[0]);
                    array_push($trainset_distance,$trainset_info2[0]->total_distance);
                    array_push($train_schedule,$object);
            }else{
                // return 2;
                    array_push($trainset_number1,$id1);
                    array_push($trainset_level_info,$trainset_info2[0]);
                    array_push($trainset_distance,$trainset_info2[0]->total_distance);
                    array_push($train_schedule,$trainschedule[0]);
            }
            
                   
              

        }


        $train_schedule1 = $train_schedule;
        foreach ($train_schedule as $station) {
             array_push($source_station,$station->source_station);
             array_push($destination_station,$station->destination_station);
             array_splice($train_schedule, 0, 1);
        }
       
        $number = count($trainset_number1);
       $level_info = DB::table('level')->orderBy('level', 'asc')->get();
       
        foreach ($trainset_level_info as $x) {

               foreach ($level_info as $value) {
          
                    if($value->total_time >= $x->total_time and $value->total_distance >= $x->total_distance) {
                        $level = $value->level;
                        $distance = $value->total_distance;
                        break; 
                        
                    }
                   
                }

                array_push($level_info1,$level);
                array_push($level_distance,$distance);
            }



             for ($x = 0; $x < $number ; $x++) {

                $balance =  $level_distance[$x] - $trainset_distance[$x];

                $source_station_distance =  DB::table('route')->select('distance')->where('name',$source_station[$x])->get();
    
                $destination_station_distance = DB::table('route')->select('distance')->where('name',$destination_station[$x])->get();
                $range = $destination_station_distance[0]->distance - $source_station_distance[0]->distance;
                if($range == 0){
                     $trainset_time = DB::table('train_set')->select('total_time','level')->where('train_number',$trainset_number1[$x])->distinct()->get();
                     $level_time = DB::table('level')->select('total_time')->where('level',$trainset_time[0]->level)->distinct()->get();
                     $diff_time = $level_time[0]->total_time - $trainset_time[0]->total_time;
                     $balance_day = $diff_time/0.00274 ;
                }else{
                    // return 2;
                    $limit = floor(300/$range);
                    if($limit<1){
                    $balance_day = floor($balance/$range)-1;
                    
                    }else {
                    $balance_day = floor($balance/$range)-$limit;;
                   
                    }
                }
                $maintenance_date = Carbon::now()->addDays($balance_day)->format('Y-m-d');


                // DB::table('train_set')->where('train_number',$trainset_number1[$x])->update(['level'=>$level_info1[$x],'updated_at'=>Carbon::now()]);

                $trainset_info1 = DB::table('train_set')->where('train_number',$trainset_number1[$x])->distinct()->get();

                array_push($trainset_info,$trainset_info1[0]);
                 array_push($maintenance_date1,$maintenance_date);
                 
             }


         $depot_info = DB::table('depot')->select('id','level','location_name')->where('free_slot','>',0)->get();   


        
        return View::make(' add_maintenance_plan')->with('trainset_info',$trainset_info)->with('depot_info',$depot_info)->with('maintenance_date',$maintenance_date1)->with('number',$number)->with('train_schedule',$train_schedule1);
      
       
            
    }

public function show_maintenance_plan(Request $info )
    {
      
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $input1 = explode('&', $info->server->get('QUERY_STRING'));//choose
        $trainset_info = array();
        $round = count($input)/4;
        $choose = array();
        $depot_endate = array();
        $ae = array();
        
        
        
        for ($x = 1; $x <= $round ; $x++) { // วนรถที่ล่ะคัน

            $info1 = substr($input[0],11); //trainset
            $info2 = substr($input[1],6); //level
            $info3 = substr($input[2],8); //depot
            $info4 = substr($input[3],9); //วันที่เ้ขาซ่อม
            
            


            $depot_name = DB::table('depot')->select('location_name')->where('id', $info3)->get();
            $depot_capa = DB::table('depot')->select('capacity')->where('id', $info3)->get();
            $depot_info1 = DB::table('maintenance')->select('id')->where('in_date',$info4)->where('depot',$depot_name[0]->location_name)->get();

            $train_in_maintenance = count($depot_info1);
            $free_slot_endate = $depot_capa[0]->capacity - $train_in_maintenance;
            
          if(  $free_slot_endate  > 0){
              DB::insert('insert into maintenance (train_number, depot,level,in_date,created_at,mark) values (?, ?, ?, ?, ? ,? )', [ $info1,$depot_name[0]->location_name,$info2,$info4,Carbon::now(),"yes"]);
                
                

          }else{
              DB::table('maintenance')->where('mark',"yes")->delete();
              $name = $depot_name[0]->location_name;
            return "รถไฟ $info1 ไม่สามารถเข้าซ่อมได้ เนื่องจากศุนย์ซ่อม  $name  วันที่ $info4 เต็ม" ;
          }
       
             array_splice($input, 0, 4);

        }
                $result = DB::table('maintenance')->where('mark',"yes")->get();
         
       
               
                return View::make('show_maintenance_plan')->with('plan',$result);
            
    }
     public function add_plan1()
    {
        DB::table('maintenance')->where('mark','yes')->update(['mark'=>NULL]);


         return Redirect::action('MaintenanceController@maintenance_info');   
    }

    public function add_plan_cancel()
    {
        DB::table('maintenance')->where('mark','yes')->delete();
        return Redirect::action('MaintenanceController@maintenance_info1');  
    }


     public function search(Request $info)
    {
        if($info->trainsetno == '' && $info->trsettype == 'not' && $info->trstatus == 'not'){
        
            $trainset_info = DB::table('train_set')->select('id','train_number','type','total_distance','total_time','status')->whereNull('deleted_at')->distinct()->get();
            
        }elseif($info->trsettype == 'not' && $info->trstatus == 'not'){
             $trainset_info =DB::table('train_set')->where('train_number',$info->trainsetno)->paginate(15);
            
        }elseif($info->trstatus == 'not' && $info->trainsetno == ''){
             $trainset_info =DB::table('train_set')->where('type',$info->trsettype)->paginate(15);
           
        }elseif($info->trsettype == 'not' && $info->trainsetno == ''){
            $trainset_info =DB::table('train_set')->where('status',$info->trstatus)->paginate(15);
            
        }elseif($info->trainsetno == ''){
             $trainset_info =DB::table('train_set')->where('type',$info->trsettype)->where('status',$info->trstatus)->paginate(15);
           
        }elseif($info->trsettype == 'not'){
            $trainset_info =DB::table('train_set')->where('train_number',$info->trainsetno)->where('status',$info->trstatus)->paginate(15);
           
        }elseif($info->trstatus == 'not'){
            $trainset_info =DB::table('train_set')->where('train_number',$info->trainsetno)->where('type',$info->trsettype)->paginate(15);
            
        }else{
            $trainset_info =DB::table('train_set')->where('train_number',$info->trainsetno)->where('type',$info->trsettype)->where('status',$info->trstatus)->paginate(15);
        }
        

        $level_info = DB::table('level')->select('level','total_time','total_distance')->orderBy('level', 'asc')->get();
        
         return View::make('maintenance_plan')->with('trainset_info',$trainset_info)->with('level_info',$level_info);;
        
    }

       public function create_maintenance_plan(){

      $depotds = array();
      $depotname = array();
      $trainset_maintenance = DB::table('maintenance')->select('train_number')->distinct()->get();
      $trainset_info = DB::table('train_set')->where('status','ว่าง')->orwhere('status','วิ่ง')->distinct()->get();
      $test = array();
      $train_free = array();
      $train_main = array();
      $level1 = array();

        foreach( $trainset_maintenance as $main){
            array_push($train_main,$main->train_number);
        }
         foreach( $trainset_info as $free){
            array_push($train_free, $free->train_number);
        }
        $all_train = array_values(array_diff( $train_free,$train_main));
        $number1 = count($all_train); 

       
            for($i = 0 ; $i < $number1 ; $i++){// ทำที่ละคัน
                $train_level1 = DB::table('train_set')->select('level','total_distance')->where('train_number', $all_train[$i] )->get();
                // return $train_level1;
                $depot_info = DB::table('depot')->select('location_name')->where('level','>=',  $train_level1[0]->level )->get();
                $trainschedule = DB::table('train_schedule')->where('train_number',$all_train[$i])->get();
                $level_info = DB::table('level')->where('level', $train_level1[0]->level )->get();
                $gap = $level_info[0]->total_distance - $train_level1[0]->total_distance;//ระนะทางเหลือที่วิ่งได้
                
                if($gap < 1000){
                    
                  $balance =  $level_info[0]->total_distance - $train_level1[0]->total_distance;
                // return $balance ;
                $source_station_distance =  DB::table('route')->select('distance')->where('name',$trainschedule[0]->source_station)->get();
                $destination_station_distance = DB::table('route')->select('distance')->where('name',$trainschedule[0]->destination_station)->get();
                $range = abs($destination_station_distance[0]->distance - $source_station_distance[0]->distance);
               

                 $limit = floor(300/$range);

                        if($limit<1){
                    $balance_day = floor($balance/$range)-1; //ลบ 1 วันให้ที่ทางเหลือไปซ่อม
                    // $balance_day1= ($balance_day)*$range;
                    // $balance_day3= $balance - $balance_day1;
                    }else {
                    $balance_day = floor($balance/$range)-$limit;
                    // $balance_day1= ($balance_day)*$range;
                    // $balance_day3= $balance - $balance_day1;
                        }


                    $maintenance_date = Carbon::now()->addDays($balance_day)->format('Y/m/d');
                    $maintenance_date1 = strtotime($maintenance_date);
                    $originDate1 = strtotime('2017/01/1');
                    $datediff = $maintenance_date1  - $originDate1;
                    $day = ($datediff / (60 * 60 * 24));
                    $mod = $day%2;
                    
                            
                    if($mod == 0){
                       $location =  $trainschedule[0]->source_station;
                       
                    }else{
                       $location = $trainschedule[0]->destination_station;
                        
                     }
                            
                            
                $station_distance = DB::table('route')->select('distance')->where('name',$location)->get();
                            

                foreach ( $depot_info as $station) {
                    $depot_distance = DB::table('route')->select('distance')->where('name',$station->location_name)->get();
                    $distance = abs($station_distance[0]->distance - $depot_distance[0]->distance);
                    array_push($depotds,$distance);
                    array_push($depotname,$station);

                  
                            }

                    $shortest_distance = min($depotds);
                    $index = array_search($shortest_distance,$depotds);
                    $depot_name = $depotname[$index]->location_name;
                    $depot_capa = DB::table('depot')->select('capacity')->where('location_name',$depot_name)->get();

                    $depot_info1 = DB::table('maintenance')->select('id')->where('in_date',$maintenance_date)->where('depot',$depot_name)->get();

                    $train_in_maintenance = count($depot_info1);
                     $free_slot_endate = $depot_capa[0]->capacity - $train_in_maintenance;
  // ----------------------------------------------------------------------->
                     
                     if($free_slot_endate  > 0){
                          DB::insert('insert into maintenance (train_number, depot,level,in_date,created_at,mark) values (?, ?, ?, ?, ? ,? )', [ $all_train[$i],$depot_name,$train_level1[0]->level,$maintenance_date,Carbon::now(),"yes"]);
                      }else{
                          DB::table('maintenance')->where('mark',"yes")->delete();
                          $name = $depot_name;
                        return "รถไฟ $train->train_number ไม่สามารถเข้าซ่อมได้ เนื่องจากศุนย์ซ่อม  $name  วันที่ $maintenance_date" ;
                      }




                
                }
                
                
         }

                
         $result = DB::table('maintenance')->where('mark',"yes")->get();
          return View::make('show_maintenance_plan')->with('plan',$result);

      
    }
    
        
    
        


       public function checklist_maintenance($id)
    {
        $level =  DB::table('maintenance')->select('level')->where('id',$id)->get();
        $checklist_info = DB::table('checklist')->where('level', $level[0]->level)->paginate(15);

        
        return View::make('checklist_maintenance')->with('checklist_info',$checklist_info)->with('id',$id);
    }


       public function checklist_checked(Request $info,$id)
    {
      
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $checklist_info = array();
        $round = count($input)/2;
 
        for ($x = 1; $x <= $round ; $x++) {

            $info1 = substr($input[0],10);
            $info2 = substr($input[1],8);
    

            DB::insert('insert into checklist_record (checklist_id, maintenance_id,result,created_at) values (?, ?, ?, ?  )', [ $info1,$id, $info2,Carbon::now()]);

            DB::table('maintenance')->where('id',$id)->update(['checklist'=>'checked','updated_at'=>Carbon::now()]);


            array_splice($input, 0, 2);
        }

        return Redirect::action('MaintenanceController@maintenance_info');   
        
    }
    

     public function search_maintenance(Request $info)
    {
        if($info->train_number == 'not' && $info->depot == 'not'){
        
            $maintenance_info = DB::table('maintenance')->whereNull('deleted_at')->get();
            
        }elseif($info->train_number == 'not'){
             $maintenance_info = DB::table('maintenance')->whereNull('deleted_at')->where('depot',$info->depot)->paginate(15);
            
        }else{
              $maintenance_info = DB::table('maintenance')->whereNull('deleted_at')->where('train_number',$info->train_number)->paginate(15);

        }
        
         return View::make('maintenance')->with('maintenance_info',$maintenance_info);
        
 
    }


     public function maintenance_info2(Request $info)
    {
        $maintenance_info = DB::table('maintenance')->whereNull('deleted_at')->paginate(15);

         return View::make('delete_maintenance')->with('maintenance_info',$maintenance_info);
        
 
    }


     public function delete(Request $info)
    {

        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $now = Carbon::now();


        foreach ($input as $id) {

            $id1 = substr($id,7);
            $maintenance_info = DB::table('maintenance')->where('id',$id1)->get();
            
            if(strtotime($maintenance_info[0]->in_date) < strtotime($now)){

                DB::table('maintenance')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);

                DB::table('train_set')->where('train_number',$maintenance_info[0]->train_number)->update(['status'=>"ว่าง"]);

                $depot_slot = DB::table('depot')->select('free_slot')->where('location_name',$maintenance_info[0]->depot)->get();
                

                $depot_slot1 = $depot_slot[0]->free_slot +1;
                
                 DB::table('depot')->where('location_name',$maintenance_info[0]->depot)->update(['free_slot'=>$depot_slot1,'updated_at'=>Carbon::now()]);

                 
                
            }else{
                DB::table('maintenance')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);

        
            }
               
        }
    
        
            return Redirect::action('MaintenanceController@maintenance_info');
        
    
 
    }

     public function choose_car(Request $info ,$id)
    {
            $train_number = DB::table('maintenance')->select('train_number')->where('id',$info->id)->get();
            $train_car_loco = DB::table('cars')->select('id')->where('train_number',$train_number[0]->train_number)->where('cars_type','locomotive')->get();
            $train_car_bogie = DB::table('cars')->select('id')->where('train_number',$train_number[0]->train_number)->where('cars_type','bogie')->get();


            
           
            return  View::make('check_3carparts')->with('cars_loco',$train_car_loco)->with('cars_bogie',$train_car_bogie)->with('id',$id);
    
    }
    public function check_parts($mid ,$id)
    {
            $cars_type =  DB::table('cars')->select('cars_type')->where('id',$id)->get();
            $parts_cars = DB::table('part')->where('cars_id',$id)->get();
            $part_alert = array();//red
            $part_alert1 = array();// yellow
            // return $cars_type;
            
             foreach ( $parts_cars as $pc) {//วนตาม part ของ cars
                $date_to_expired = (strtotime($pc->expired_date) - strtotime('now'))/86400;
                $part_type = DB::table('part_type')->select('lifetime_distance','lifetime_time')->where('part_type',$pc->part_type)->get();
                $result_dis = $part_type[0]->lifetime_distance - $pc->total_distance;
                $result_time =  $part_type[0]->lifetime_time - $pc->total_time;
                

                  if($date_to_expired <= 50 or $result_dis <= 500 or $result_time <= 0.08 ){
                  
                         array_push($part_alert,$pc->part_type);
                  
                  }else  if($date_to_expired <= 100 or $result_dis <= 1000 or $result_time <= 0.20){

                        array_push($part_alert1,$pc->part_type);

                  }
                

             }
             
            
            if($cars_type[0]->cars_type == "locomotive"){

                 $part_type_lo = DB::table('part_cars')->where('cars_type',"locomotive")->get();
                 
                 return view('check_locoparts')->with('id',$id)->with('part_alert',$part_alert)->with('part_alert1',$part_alert1)->with('mid',$mid)->with('part_lo',$part_type_lo);  

            }else if($cars_type[0]->cars_type == "bogie"){
                 $part_type_bo = DB::table('part_cars')->where('cars_type',"bogie")->get();
                 
                 return view('check_bogieparts')->with('id',$id)->with('part_alert',$part_alert)->with('part_alert1',$part_alert1)->with('mid',$mid)->with('part_bo',$part_type_bo);    

            }
          
        
    
 
    }

     public function check_editpart( $mid,$id,$part)
    {
            $origin_part_info = DB::table('part')->where('part_type',$part)->where('cars_id',$id)->get();
            $brand_info = DB::table('part')->select('brand')->where('part_type',$part)->where('cars_id',NULL)->where('status','ใช้ได้')->distinct()->get();
            $code_info =  DB::table('part')->select('brand','code')->where('part_type',$part)->where('cars_id',NULL)->where('status','ใช้ได้')->distinct()->get();
            
           // return $origin_part_info;
           return view('check_editpart')->with('origin_part_info',$origin_part_info)->with('brand_info',$brand_info)->with('code_info',$code_info)->with('id',$id);
 
    }

     public function change_part(Request $info,$id,$part)
    {
            DB::table('part')->where('part_type',$part)->where('cars_id',$id)->update(['updated_at'=>Carbon::now(),'cars_id'=>NULL,'status'=>'ใช้ไม่ได้']);//อะไหล่เก่า
            
            $min_expired = DB::table('part')->where('part_type',$part)->where('brand',$info->brand)->where('code',$info->code)->where('status',"ใช้ได้")->min('expired_date');

            $changed_part = DB::table('part')->where('part_type',$part)->where('brand',$info->brand)->where('code',$info->code)->where('status',"ใช้ได้")->where('expired_date',$min_expired)->get();

            DB::table('part')->where('id',$changed_part[0]->id)->update(['updated_at'=>Carbon::now(),'cars_id'=>$id]);//อะไหล่ใหม่

           return Redirect::action('MaintenanceController@check_parts',['id'=>$id]);
        
 
    }
    
}
