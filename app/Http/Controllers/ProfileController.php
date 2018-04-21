<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseControllers;
use Auth;
use App\User;
use App\Memes;
class ProfileController extends BaseController
{
    private $user = null;
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id = ""){
        if($id == ""){
            $this->user = Auth::user();
        }else{
            $this->user = User::find($id);
        }

        $my_memes = Memes::where('user_id',$this->user->id)->orderBy('id','desc')->get();

        $data = [
            'memes'=>$my_memes,
            'user'=>$this->user
        ];
        return view('pages.profile')->with($data);
    }

    public function uploadAvatar(Request $request){
        $filename = $_FILES['file']['name'];
        
       
        $location = "images/".$filename;
        $imageName = pathinfo($location);
        $ext = $imageName['extension'];
        $filename = "avatar_".Auth::user()->id . '.'.$ext;
        
        $user = User::find(Auth::user()->id);
        
        $user->avatar =  $filename;
        $user->save();
         $location = "images/".$filename;	
        move_uploaded_file($_FILES['file']['tmp_name'],$location);
    }
}
