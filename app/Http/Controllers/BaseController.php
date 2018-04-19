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
                
            }
            return $next($request);
             
        });
    }
}
