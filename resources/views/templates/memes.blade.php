<div class="singleMeme">
    <div class="memeUser">
        <?php $avatarImage = "";
            if($meme->social_login = 0):
            $avatarImage = asset('images/'.$meme->avatar);
            else:
            $avatarImage = $meme->avatar;
            endif;

        ?>
        <div class="" style="background-image:url({{$avatarImage}})"></div> <span class="meme_username">{{$meme->name}}</span>
        <span class="clearfix"></span>
    </div>
    <img src="{{ asset('memes').'/'.$meme->image }}">
    <div class="memeBar">
        @if(Auth::check())
        <div class="like <?php if(Auth::user()->isMemeLiked($meme->id)): ?> liked <?php endif; ?>" id="meme_{{$meme->id}}">
            <span class="fa fa-thumbs-up"></span> <span class="likeStatus">
                @if(Auth::user()->isMemeLiked($meme->id))
                    Liked 
                @else
                    Like 
                @endif
                
            </span>
        </div>
        <div class="comment" id="meme_{{$meme->id}}">
           <span class="fa fa-comment"></span>  Comment
        </div>
         <div class="clearfix"></div>
         <div class="commentBox">
            <input type="text" placeholder="Enter a comment" id="userComment">
            <button class="btn btn-primary" onclick="pageFunc.postComment({{$meme->id}},this)">Comment</button>
            <div class="clearfix"></div>
            <div class="memeComments">
                
                @foreach($meme->comments as $comment)
                    <div class="singleComment">
                        <span class="commentUser">{{$comment->users[0]->name}}</span>
                        {{$comment->comment}}
                    </div>
                @endforeach
            </div>
         </div>
        @endif
        <div class="stats">
           
           <span class="fa fa-folder"></span> {{$meme->category_name}}
           <span class="fa fa-clock-o"></span> {{time_elapsed_string('@'.$meme->time)}}
           <span class="fa fa-comments"></span> {{$meme->comments_count}}
        </div>
        <div class="clearfix"></div>
    </div>
</div>