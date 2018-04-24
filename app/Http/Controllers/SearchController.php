<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    public function get(Request $request){
        $request = $request->all();
        $result = DB::table('users')->where('name','like','%'.$request['keyword'].'%')->get();

        return $result;
    }
}
