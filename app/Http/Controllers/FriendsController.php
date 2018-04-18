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
        DB::table('friends')->insert([
            'friend_1_id'=>Auth::user()->id,
            'friend_2_id'=>$id,
            'time'=>time()

        ]);
        return redirect()->back();
    }
}
