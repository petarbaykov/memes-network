<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Memes;
use Auth;
use DB;
use App\Categories;
class CategoriesController extends BaseController
{
    public function get($slug){
        $memes = Memes::join('users','users.id','=','memes.user_id')
            
            ->join('memes_categories','memes.id','=','memes_categories.meme_id')
            ->join('categories','memes_categories.category_id','=','categories.id')
            ->leftJoin('comments','comments.meme_id','=','memes.id')
            ->orderBy('memes.id','desc')
            
            ->groupBy('memes.id')
            ->select('memes.*','users.name','users.avatar','users.social_login','categories.name as category_name','categories.slug as category_slug',DB::raw('count(comments.meme_id) as comments_count'))
            ->where('categories.slug',$slug)
            ->get();
            
       $categories = Categories::all();
       
        $data = [
            'memes'=>$memes,
           'categories'=>$categories
        ];
        return view('meme.categories')->with($data);
    }
}
