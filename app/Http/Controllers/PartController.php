<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use View;
use Redirect;

class PartController extends Controller
{
    public function add(Request $info1)
    {
        for ($x = 1; $x <= $info1->qauntity ; $x++) {


    	DB::insert('insert into part (part_type, manufactured_date,expired_date,brand,code,price,created_at) values (?, ?, ?, ?, ? ,? ,?)', [ $info1->part_type, $info1->m_day,$info1->e_day,$info1->brand,$info1->code,$info1->price,Carbon::now()]);
        }
    	return Redirect::action('PartController@part_info');	

        // return $info1->qauntity;
	    	
	}

    public function part_info()
    {
    	$part_info = DB::table('part')->whereNull('deleted_at')->paginate(15);

        $part_type_info = DB::table('part_type')->select('part_type')->get();

        $part_brand_info = DB::table('part')->select('brand')->distinct()->get();

        $part_cars_info = DB::table('part')->select('cars_id')->distinct()->get();
    	 
    	return View::make('part_management')->with('part_info',$part_info)
        ->with('part_type_info',$part_type_info)->with('part_brand_info',$part_brand_info)->with('part_cars_info',$part_cars_info);
        // return $part_cars_info;
    }

    public function part_info1()
    {
        $part_info = DB::table('part')->whereNull('deleted_at')->paginate(15);

        $part_type_info = DB::table('part_type')->select('part_type')->get();

        $part_brand_info = DB::table('part')->select('brand')->distinct()->get();

        $part_cars_info = DB::table('part')->select('cars_id')->distinct()->get();
         
        return View::make('delete_part_management')->with('part_info',$part_info)
        ->with('part_type_info',$part_type_info)->with('part_brand_info',$part_brand_info)->with('part_cars_info',$part_cars_info);
        // return $part_cars_info;
    }

// ---------------------------------------------เรียกข้อมูล part_type มาเป็นตัวเลือก
      public function part_type_info() 
    {
    	$part_type_info = DB::table('part_type')->select('part_type')->get();
    	 
    	return View::make('add_part_management', array('part_type_info' => $part_type_info));

    }


    public function edit($id)
    {
    	$origin_info = DB::table('part')->where('id',$id)->get();

        $part_type_info = DB::table('part_type')->select('id','part_type')->get();  

    	return View::make('edit_part_management', array('origin_info' => $origin_info), array('part_type_info' => $part_type_info));

    	
    }

    public function update(Request $info ,$id)
    {
    	
    	DB::table('part')->where('id',$id)->update(['part_type'=>$info->part_type,'manufactured_date'=>$info->m_day,'expired_date'=>$info->e_day,'brand'=>$info->brand,'code'=>$info->code,'price'=>$info->price,'updated_at'=>Carbon::now()]);

    	 return Redirect::action('PartController@part_info');	
            // return $info;    	     
	}





// ---------------------------------------------เพิ่มข้อมูล part_type เข้าระบบ

	  public function add_part_type(Request $info1)
    {
    	DB::insert('insert into part_type (part_type, lifetime_time,lifetime_distance,created_at) values (?, ?, ?,?)', [ $info1->part_name, $info1->time,$info1->distance,Carbon::now()]);

    	//  return Redirect::action('PartController@part_info');	
    	return view('add_part_type');
    }

// ---------------------------------------------search part
    public function search(Request $info)
    {
        if($info->part_cars_id == 'not' && $info->part_type == 'not' && $info->brand == 'not'){
            // DB::table('part')->where('part_type',$info->part_type)->where('cars_id',$info->part_cars_id)->where('brand',$info->brand)->get();
            $part_info = DB::table('part')->paginate(15);
            // return $part_info;
        }elseif($info->part_cars_id == 'not' && $info->part_type == 'not'){
             $part_info =DB::table('part')->where('brand',$info->brand)->paginate(15);
            // return $part_info;
        }elseif($info->part_type == 'not' && $info->brand == 'not'){
             $part_info =DB::table('part')->where('cars_id',$info->part_cars_id)->paginate(15);
            // return $part_info;
        }elseif($info->part_cars_id == 'not' && $info->brand == 'not'){
            $part_info = DB::table('part')->where('part_type',$info->part_type)->paginate(15);
            // return $part_info;
        }elseif($info->brand == 'not'){
             $part_info =DB::table('part')->where('part_type',$info->part_type)->where('cars_id',$info->part_cars_id)->paginate(15);
            // return $part_info;
        }elseif($info->part_cars_id == 'not'){
            $part_info = DB::table('part')->where('part_type',$info->part_type)->where('brand',$info->brand)->paginate(15);
            // return $part_info;
        }elseif($info->part_type == 'not'){
            $part_info = DB::table('part')->where('cars_id',$info->part_cars_id)->where('brand',$info->brand)->paginate(15);
            // return $part_info;
        }else{
            $part_info = DB::table('part')->where('cars_id',$info->part_cars_id)->where('brand',$info->brand)->where('part_type',$info->part_type)->paginate(15);
        }
   

        $part_type_info = DB::table('part_type')->select('part_type')->get();

        $part_brand_info = DB::table('part')->select('brand')->distinct()->get();

        $part_cars_info = DB::table('part')->select('cars_id')->distinct()->get();
         
        return View::make('part_management')
        ->with('part_info',$part_info->setPath('search_part?part_type='.$info->part_type.'&brand='.$info->brand.'&part_cars_id='.$info->part_cars_id))
            ->with('part_type_info',$part_type_info)->with('part_brand_info',$part_brand_info)
            ->with('part_cars_info',$part_cars_info);
        // return 'krikri';
    }


     public function delete(Request $info)
    {
    
        $input  = explode('&', $info->server->get('QUERY_STRING'));
        $all_id = array();

        foreach ($input as $id) {

            $id1 = substr($id,7);
            DB::table('part')->where('id',$id1)->update(['deleted_at'=>Carbon::now()]);
           
        }
        
              return Redirect::action('PartController@part_info');
    }
}
