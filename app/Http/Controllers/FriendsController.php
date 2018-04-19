<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;
use Auth;
use DB;
class FriendsController extends BaseController
{
    public function suggests(){
        $users = User::where('id','!=',Auth::user()->id)->get();
        $data = [
            'users'=>$users
        ];
        return view('friend-suggests')->with($data);
    }

    public function invite($id){
        DB::table('followers')->insert([
            'user_id'=>Auth::user()->id,
            'follow_id'=>$id

        ]);
        return redirect()->back();
    }
}
