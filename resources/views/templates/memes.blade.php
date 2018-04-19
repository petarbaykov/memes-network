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
    </div>
</div>