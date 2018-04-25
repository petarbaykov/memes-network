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
        dd($this->getFriendSuggestion());
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

    public function getFriends($userId){
        return DB::table('followers')->where('user_id',$userId)->orWhere('follow_id',$userId)->get();
    }

    public function getFriendSuggestion(){
        $friends = $this->getFriends(Auth::user()->id);
        $suggestedFriends = [];
        
        foreach($friends as $friend){
            
            $ff_list = $this->getFriends($friend->id);
           
            foreach($ff_list as $ffriendId){
                
                if ($ffriendId->user_id != Auth::user()->id && !$friends->contains($ffriendId) && $ffriendId->follow_id != Auth::user()->id) {
                    $suggestedFriends[$ffriendId->user_id] = ['mutual_friends' => []];
                    $ff_friends = $this->getFriends($ffriendId->user_id);
                   
                    foreach ($ff_friends as $ff_friendId) {
                        if ($friends->contains($ff_friendId)) {
                           
                            # If he is a friend of the current user, he is a mutual friend
                            
                        }
                        $suggestedFriends[$ffriendId->user_id]['mutual_friends'][] = $ff_friendId->user_id;
                    }
                }
            }
        }

        return $suggestedFriends;
    }
}
