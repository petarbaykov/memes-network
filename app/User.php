<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers(){

        return $this->belongsToMany('App\User','followers','follow_id','user_id');
    }

    public function followings(){
        return $this->belongsToMany('App\User','followers','user_id','follow_id');
    }

    public function getLikedMemes(){
        return DB::table('likes')->where('user_id',$this->id)->get();
    }
    public function countFollowers(){
        return DB::table('followers')->where('follow_id',$this->id)->count();
    }
    public function countFollowing(){
        return DB::table('followers')->where('user_id',$this->id)->count();
    }
    public function isMemeLiked($meme_id){
        foreach($this->getLikedMemes() as $liked){
            if($liked->meme_id == $meme_id){
                return true;
            }
        }
        return false;
    }

    public function countMemes(){
        return DB::table('memes')->where('user_id',$this->id)->count();
    }

    public function isFollower($id){
        $user = DB::table('followers')->where('user_id',$this->id)->where('follow_id',$id)->first();
        if($user){
            return true;
        }
        return false;
    }
    public function avatarImage(){
        
        if($this->social_login == 0){
            return asset('images/'.$this->avatar);
        }
        return $this->avatar;
         
        
    }
}
