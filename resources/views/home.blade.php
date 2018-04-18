@extends('layouts.app')

@section('content')
    <div class="container">
       
            <div class="">
                Покани: 
            </div>
            <div class="mainContent">
                 @foreach($memes as $meme)
                    <div class="singleMeme">
                        <img src="{{ asset('memes').'/'.$meme->image }}">
                    </div>
                @endforeach
            </div>
            <div class="">
            One of three columns
            </div>
       
    </div>
   
@endsection
