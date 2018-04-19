<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Memes;
use Auth;
use DB;
class MemeController extends BaseController
{
    public function new(){

        return view('meme.new');
    }

    public function save(Request $request){
        $data = $request->all();
        $img = $data['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        
        $fileName = Auth::user()->id . time() .'.png';
        file_put_contents(public_path(). '/memes/'.$fileName, $fileData);
        $meme = new Memes();
        $meme->user_id = Auth::user()->id;
        $meme->image = $fileName;
        $meme->time = time();
        $meme->save();
    }

    public function like(Request $request){

        $data = $request->all();
        DB::table('likes')->insert([
            'meme_id'=>$data['meme_id'],
            'user_id'=>Auth::user()->id,
            'time'=>time()
        ]);
    }
}
