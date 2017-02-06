<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Redirect;

class TrainSetController extends Controller
{
    public function add(Request $info1)
    {
    	DB::insert('insert into train_set(type) value(?)', [$info1->trsettype]);

    	return Redirect::action('TrainSetController@trainset_info)');
    }

     public function trainset_info()
    {
    	$trainset_info = DB::table('train_set')->get();
    	 
    	return View::make('trainset_management', array('trainset_info' => $trainset_info));
    }
}
