<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseControllers;
use Auth;
use App\User;
class ProfileController extends BaseController
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        return view('pages.profile');
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
