@extends('layouts.app')

@section('content')
    <div class="container">
       
            <div class="">
                Покани: 
            </div>
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
