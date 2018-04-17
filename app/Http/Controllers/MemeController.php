<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
class MemeController extends BaseController
{
    public function new(){

        return view('meme.new');
    }
}
