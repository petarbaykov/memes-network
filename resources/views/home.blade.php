@extends('layouts.app')

@section('content')
    <div class="container">
       
            <aside class="fixedCategories">
                Покани: 
            </aside>
            <div class="mainContent">
                 @foreach($memes as $meme)
                    @include('templates.memes')
                @endforeach
            </div>
            <div class="">
            One of three columns
            </div>
       
    </div>
   
@endsection
