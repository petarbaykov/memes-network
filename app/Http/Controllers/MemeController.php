<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Memes;
use Auth;
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
}
