<div class="singleMeme">
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
        @endif
        <div class="stats">
           <span class="fa fa-user"></span> {{$meme->name}}
           <span class="fa fa-folder"></span> {{$meme->category_name}}
           <span class="fa fa-clock-o"></span> {{time_elapsed_string('@'.$meme->time)}}
           <span class="fa fa-comments"></span> {{$meme->comments_count}}
        </div>
    </div>
</div>