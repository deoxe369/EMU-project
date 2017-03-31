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
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $tain_set_number = substr($input[0],11);
        $tain_set_type = substr($input[1],7);
        $all_cars = array_splice($input,2);
        $number = count($all_cars);
        


         DB::insert('insert into train_set(type, train_number,created_at) value(?, ?,?)', [$tain_set_type, $tain_set_number,Carbon::now()]);

        for ($i=0; $i <  $number; $i++) { 
           $cars_id = substr($all_cars[0],8);
           $all_cars = array_splice($all_cars,1);
           DB::table('cars')->where('id',$cars_id)->update(['status'=>'ไม่ว่าง','train_number'=>$tain_set_number,'updated_at'=>Carbon::now()]);

        }
        return Redirect::action('TrainSetController@trainset_info');
        
        
    }

     public function trainset_info()
    {
    	$trainset_info = DB::table('train_set')->select('id','train_number','type','total_distance','total_time','status')->whereNull('deleted_at')->distinct()->paginate(15);

        // $composit_info = DB::table('train_set')->select('train_number','type','total_distance','total_time','status')->distinct()->get();
    	 
         // $trainset_info['composit'] = '';
    	return View::make('trainset_management', array('trainset_info' => $trainset_info));

       // return $trainset_info;
        
    }

     public function trainset_info1()
    {
        $trainset_info = DB::table('train_set')->select('id','train_number','type','total_distance','total_time','status')->whereNull('deleted_at')->distinct()->get();

        // $composit_info = DB::table('train_set')->select('train_number','type','total_distance','total_time','status')->distinct()->get();
         
         // $trainset_info['composit'] = '';
        return View::make('delete_trainset_management', array('trainset_info' => $trainset_info));

       // return $trainset_info;
        
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
        $origin_info = DB::table('train_set')->where('train_number',$id)->whereNull('deleted_at')->get();

        $origin_loco = DB::table('cars')->select('id')->where('cars_type','locomotive')->where('train_number',$id)->whereNull('deleted_at')->get();
        $origin_bogie = DB::table('cars')->select('id')->where('cars_type','bogie')->where('train_number',$id)->whereNull('deleted_at')->get();
        $number = count($origin_bogie);
        
       

        $cars_loco_info = DB::table('cars')->where('cars_type','locomotive')->where('status','ว่าง')->get();
        $cars_bogie_info = DB::table('cars')->where('cars_type','bogie')->where('status','ว่าง')->get();
       

        // $part_type_info = DB::table('part_type')->select('id','part_type')->get();  

        return View::make('edit_trainset_management')->with('cars_loco_info' ,$cars_loco_info)->with('cars_bogie_info' ,$cars_bogie_info)->with('origin_info' ,$origin_info)->with('origin_loco',$origin_loco)->with('origin_bogie',$origin_bogie)->with('number',$number);
   
        // return $origin_info;

        
    }
    public function update(Request $info ,$id)
    {

         $origin_info = DB::table('train_set')->where('train_number',$id)->whereNull('deleted_at')->get();

         $origin_cars_info = DB::table('cars')->select('id')->where('train_number',$id)->get();
        

        if($origin_info[0]->type == 'trcar3'){

        
        $origin_info_car1 = $origin_cars_info[0]->id;
        $origin_info_car2 = $origin_cars_info[1]->id;
        $origin_info_car3 = $origin_cars_info[2]->id;

        DB::table('cars')->where('id',$origin_info_car1)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$origin_info_car2)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$origin_info_car3)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);


        }
        if($origin_info[0]->type == 'trcar4'){

       
        $origin_info_car1 = $origin_info[0]->cars_id;
        $origin_info_car2 = $origin_info[1]->cars_id;
        $origin_info_car3 = $origin_info[2]->cars_id;
        $origin_info_car4 = $origin_info[3]->cars_id;

        DB::table('cars')->where('id',$origin_info_car1)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$origin_info_car2)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$origin_info_car3)->update(['status'=>'ว่าง','updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$origin_info_car4)->update(['status'=>'ว่าง','train_number'=>null,'updated_at'=>Carbon::now()]);
        }
        
         // DB::table('train_set')->where('train_number',$id)->update(['deleted_at'=>Carbon::now()]);

         if( $info->trtype == 'trcar3'){

        DB::table('train_set')->where('train_number',$id)->update(['type'=>$info->trtype,'updated_at'=>Carbon::now()]);

        DB::table('cars')->where('id',$info->comtrcar3_1)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar3_2)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar3_3)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
       

        return Redirect::action('TrainSetController@trainset_info');

        }

        if( $info->trtype == 'trcar4'){

        DB::table('train_set')->where('train_number',$id)->update(['type'=>$info->trtype,'updated_at'=>Carbon::now()]);

        DB::table('cars')->where('id',$info->comtrcar4_1)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar4_2)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
        DB::table('cars')->where('id',$info->comtrcar4_3)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);
         DB::table('cars')->where('id',$info->comtrcar4_4)->update(['status'=>'ไม่ว่าง','train_number'=>$id,'updated_at'=>Carbon::now()]);

        return Redirect::action('TrainSetController@trainset_info');
      
        }
        // // if( $info->trtype == 'trgoods'){

        // return '3';
        // }
        // if( $info->trtype == 'trtrolley'){

        // return '4';
        // }
         // return  $origin_cars_info[1]->id ;
        
    }


    public function delete(Request $info)
    {
    
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $all_id = array();

        foreach ($input as $id) { //วนรถ

            $id1 = substr($id,7);
            DB::table('train_set')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);
            $train_number = DB::table('train_set')->select('train_number')->where('id',$id1)->get();
            $cars_id = DB::table('cars')->select('id')->where('train_number',$train_number[0]->train_number)->get();

            foreach ($cars_id as $cid) {
                DB::table('cars')->where('id',$cid->id)->update(['status'=>"ว่าง",'train_number'=>NULL,'updated_at'=>Carbon::now()]);    
                
            }
            
        }
            
              return Redirect::action('TrainSetController@trainset_info');
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
        


        
         return View::make('trainset_management', array('trainset_info' => $trainset_info));
 
    }

    
}
