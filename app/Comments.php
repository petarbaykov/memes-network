<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\User','id','user_id');
    }
}
