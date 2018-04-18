@foreach($users as $user)
    {{$user->name}}
    <a href="{{asset('invite/'.$user->id)}}">Добавяне на приятел</a>
@endforeach