<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Memes;
use Auth;
use DB;
use App\Services\Notification;
class MemeController extends BaseController
{
    public function new(){
        $categories = DB::table('categories')->get();
        $data = [
            'categories'=>$categories
        ];
        return view('meme.new')->with($data);
    }

    public function save(Request $request){
        $data = $request->all();
        /*$img = $data['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        
        $fileData = md5_file( $_FILES["img"]['tmp_name']);*/
         $fileName = $_FILES['img']['name'];
        
       
        $location = "memes/". $fileName;
        $imageName = pathinfo($location);
        $ext = $imageName['extension'];
         $fileName = Auth::user()->id .time(). '.'.$ext;

         $location = "memes/". $fileName;	
        move_uploaded_file($_FILES['img']['tmp_name'],$location);

        /*$fileName = Auth::user()->id . time() .'.png';
        file_put_contents(public_path(). '/memes/'.$fileName, $fileData);*/
        $meme = new Memes();
        $meme->user_id = Auth::user()->id;
        $meme->image = $fileName;
        $meme->time = time();
        $meme->save();

        DB::table('memes_categories')->insert([
            'meme_id'=>$meme->id,
            'category_id'=>$data['category']
        ]);

        
    }

    public function like(Request $request){

        $data = $request->all();
        $like = DB::table('likes')->insertGetId([
            'meme_id'=>$data['meme_id'],
            'user_id'=>Auth::user()->id,
            'time'=>time()
        ]);
        $meme_owner = Memes::where('id',$data['meme_id'])->select('user_id')->first();
       
        Notification::sendNotification($meme_owner->user_id,'like',$like);
    }
}
