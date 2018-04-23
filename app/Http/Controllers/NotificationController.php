<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use DB;

use Auth;
class NotificationController extends BaseController
{
    public function seen(Request $request){

        $request = $request->all();
        DB::table('notifications')->where('user_id',Auth::user()->id)->update(['status'=>1]);

    }
}
