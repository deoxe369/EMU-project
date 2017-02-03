<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Redirect;

class PartController extends Controller
{
    public function add(Request $info1)
    {
    	DB::insert('insert into part (part_type_id, manufactured_date,expired_date,brand,price) values (?, ?, ?, ?, ? )', [ $info1->part_type_id, $info1->m_day,$info1->e_day,$info1->brand,$info1->price]);

    	return Redirect::action('PartController@part_info');	
	    	
	}

    public function part_info()
    {
    	$part_info = DB::table('part')->get();
    	 
    	return View::make('part_management', array('part_info' => $part_info));
    }

// ---------------------------------------------เรียกข้อมูล part_type มาเป็นตัวเลือก
      public function part_type_info() 
    {
    	$part_type_info = DB::table('part_type')->select('id','part_type')->get();
    	 
    	return View::make('add_part_management', array('part_type_info' => $part_type_info));

    }


 //    public function edit($id)
 //    {
 //    	$origin_info = DB::table('depot')->where('id',$id)->get();

 //    	return View::make('edit_depot_management', array('origin_info' => $origin_info));
    	
 //    }

 //    public function update(Request $info ,$id)
 //    {
    	
 //    	DB::table('depot')->where('id',$id)->update(['location'=>$info->location,'location_name'=>$info->location_name,'capacity'=>$info->capacity]);

 //    	 return Redirect::action('DepotController@depot_info');	
    	     
	// }





// ---------------------------------------------เพิ่มข้อมูล part_type เข้าระบบ

	  public function add_part_type(Request $info1)
    {
    	DB::insert('insert into part_type (part_type, lifetime_time,lifetime_distance) values (?, ?, ?)', [ $info1->part_name, $info1->time,$info1->distance]);

    	//  return Redirect::action('PartController@part_info');	
    	return view('addparttype');
    }

}
