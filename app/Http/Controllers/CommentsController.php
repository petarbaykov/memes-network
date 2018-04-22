<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Comments;
use Auth;
use App\Memes;
use App\Services\Notification;
class CommentsController extends BaseController
{
        public function post(Request $request){
            $data = $request->all();
            $comment = new Comments();
            $comment->meme_id = $data["meme_id"];
            $comment->user_id = Auth::user()->id;
            $comment->comment = $data['comment'];

            $comment->save();
            $meme_owner = Memes::where('id',$data['meme_id'])->select('user_id')->first();
            Notification::sendNotification($meme_owner->user_id,'comment', $comment->id);
            return ["name"=>Auth::user()->name];
        }
}
