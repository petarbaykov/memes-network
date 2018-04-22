<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;
use Auth;
use DB;
use App\Services\Notification;
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
        $follow = DB::table('followers')->insertGetId([
            'user_id'=>Auth::user()->id,
            'follow_id'=>$id

        ]);
        Notification::sendNotification($id,'follow', $follow);
        return redirect()->back();
    }
}
