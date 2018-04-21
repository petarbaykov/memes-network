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
        $memes = Memes::join('users','users.id','=','memes.user_id')
            
            ->join('memes_categories','memes.id','=','memes_categories.meme_id')
            ->join('categories','memes_categories.category_id','=','categories.id')
            ->leftJoin('comments','comments.meme_id','=','memes.id')
            ->orderBy('memes.id','desc')
            
            ->groupBy('memes.id')
            ->select('memes.*','users.name','users.avatar','users.social_login','categories.name as category_name',DB::raw('count(comments.meme_id) as comments_count'))
            ->get();
            
       
        
        $data = [
            'memes'=>$memes,
           
        ];
        return view('home')->with($data);
    }
}
