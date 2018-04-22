<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memes extends Model
{
    protected $table = "memes";

    public function comments(){
        return $this->hasMany('App\Comments','meme_id');
    }
}
