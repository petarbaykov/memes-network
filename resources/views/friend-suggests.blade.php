@foreach($users as $user)
    {{$user->name}}
    <a href="{{asset('invite/'.$user->id)}}">Добавяне на приятел</a>
@endforeach

Followers
<?php 
    foreach(Auth::user()->followers as $follower){
       echo $follower->name ;
    }
    
?>