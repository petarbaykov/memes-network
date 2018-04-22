<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Comments;
use Auth;
class CommentsController extends BaseController
{
        public function post(Request $request){
            $data = $request->all();
            $comment = new Comments();
            $comment->meme_id = $data["meme_id"];
            $comment->user_id = Auth::user()->id;
            $comment->comment = $data['comment'];

            $comment->save();

            return ["name"=>Auth::user()->name];
        }
}
