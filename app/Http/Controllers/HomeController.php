<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memes;
use Auth;
use DB;
class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memes = Memes::orderBy('memes.id','desc')
            ->select('memes.*')
            
            ->get();

        
        
        $data = [
            'memes'=>$memes,
           
        ];
        return view('home')->with($data);
    }
}
