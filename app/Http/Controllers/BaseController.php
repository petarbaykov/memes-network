<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class BaseController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {  

           
            if(Auth::check()){
                $friend_reuests = DB::table('friends')
                    ->join('users','users.id','=','friends.friend_1_id')
                    ->where('friend_2_id',Auth::user()->id)
                    ->where('status',0)
                    ->get();
               
                \View::share('friends_requests', $friend_reuests);
            }
            return $next($request);
             
        });
    }
}
