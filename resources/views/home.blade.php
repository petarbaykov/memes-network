@extends('layouts.app')

@section('content')
    <div class="container relative">
       
            <aside class="fixedCategories">
                <h4>Categories</h4>
                @foreach($categories as $category)
                    <a class="singleCategory" href="{{asset('category/'.$category->slug)}}">
                        <img src="{{asset('categories/'.$category->image)}}">
                        {{$category->name}}
                    </a>
                @endforeach
            </aside>
            <aside class="fixedWidgets">
                @if(Auth::check())
                <div class="asideUserBox">
                    <div class="upperPart">
                        {{Auth::user()->name}}
                    </div>
                    <div class="userImage">
                        <div id="asideImage" style="background-image:url({{Auth::user()->avatarImage()}})" onclick="">
                        
                        </div>
                    </div>
                    <div class="downPart">
                        <div class="justifyFlex">
                            <div class="statBox border-right"><span class="statCount">{{Auth::user()->countMemes()}}</span> memes</div>
                            <div class="statBox border-right" ><span class="statCount">{{Auth::user()->countFollowers()}}</span> followers</div>
                            <div class="statBox" ><span class="statCount">{{Auth::user()->countFollowing()}}</span> following</div>
                        </div>
                    </div>
                </div>
                @endif
            </aside>
            <div class="mainContent">
                 @foreach($memes as $meme)
                    @include('templates.memes')
                @endforeach
            </div>
            
    </div>
  
@endsection
