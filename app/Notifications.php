<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = "notifications";
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'notification_type', 'notification_id','time','status','from_user_id'
    ];

    public function users(){
        return $this->hasMany('App\User','id','from_user_id');
    }
}
