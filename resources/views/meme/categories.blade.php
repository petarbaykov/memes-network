@extends('layouts.app')

@section('content')
    <div class="container">
       
            <aside class="fixedCategories">
                <h4>Categories</h4>
                @foreach($categories as $category)
                    <a class="singleCategory" href="{{asset('category/'.$category->slug)}}">
                        <img src="{{asset('categories/'.$category->image)}}">
                        {{$category->name}}
                    </a>
                @endforeach
            </aside>
            <div class="mainContent">
                 @foreach($memes as $meme)
                    @include('templates.memes')
                @endforeach
            </div>
            
       
    </div>
   
@endsection
