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
    	DB::insert('insert into train_set(type, composition) value(?, ?)', [$info1->trsettype, $info1->composition]);

    	return Redirect::action('TrainSetController@trainset_info)');
    }
}
