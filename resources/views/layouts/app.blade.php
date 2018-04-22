<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/main.css') }}" rel="stylesheet">
     <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
     <script>
        var baseUrl = "<?php echo asset('/'); ?>";
     </script>
</head>
<body @if( (isset($page) && ( $page == "home" || $page == "auth") || isset($isAuth ))) class="bodyBg" @endif>
    <div id="app">
        @if(!isset($isAuth))
        <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top ">
            <div class="container">
          <a class="navbar-brand" href="{{asset('/')}}">Memes Share</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav  ml-auto">
              @guest
                 <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Вход <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация <span class="sr-only">(current)</span></a>
                  </li>
            @else
              <li class="nav-item ">
                    
                    <div class="dropdown dropdownMenu">
                      <a class="nav-link relative" href="#" id="notifications">
                        <span class="fa fa-bell"></span>
                        <span class="notiCounter">{{Auth::user()->unseenNotifications()}}</span>
                     </a>
                      <div class="notiicationsDropDown dropdown-content">
                        <div class="notificationHeading">
                          <div class="arrow-up"></div>
                          <h6>Notifications</h6>
                        </div>
                        <div class="notificationsBody">
                          @foreach(Auth::user()->notifications->sortByDesc('id') as $notification)
                          
                            @if( $notification->status == 0)
                            <div class="singleNotification">
                                @if($notification->notification_type == "like" )
                                  <div class="justifyFlexCenter justifyLeft">
                                    <img class="notiPic" src=" {{$notification->users[0]->avatarImage()}}"> <div class="notiMsg"><strong>{{$notification->users[0]->name}}</strong> liked <b>your meme</b> <br>{{time_elapsed_string('@'.$notification->time)}}</div>
                                  </div>
                                @elseif($notification->notification_type == "comment")
                                  <div class="justifyFlexCenter justifyLeft">
                                    <img class="notiPic" src=" {{$notification->users[0]->avatarImage()}}"> <div  class="notiMsg"><strong>{{$notification->users[0]->name}}</strong> comment on <b>your meme</b> <br>{{time_elapsed_string('@'.$notification->time)}}</div>
                                  </div>
                                @elseif($notification->notification_type == "follow")
                                  <div class="justifyFlexCenter justifyLeft">
                                    <img class="notiPic" src=" {{$notification->users[0]->avatarImage()}}"> <div  class="notiMsg"><strong>{{$notification->users[0]->name}}</strong> followed you <br>{{time_elapsed_string('@'.$notification->time)}}</div>
                                  </div>
                              @endif
                            </div>
                           @endif
                        @endforeach
                        </div>
                      </div>
                    </div>
              </li>
              <li class="nav-item justifyFlex">
                <a class="nav-link " href="#" id="navbarUserName" >
                   {{ Auth::user()->name }}

                </a>
                <div class="dropdown dropdownMenu">
                    <div class="memeUser">
                       <div class="" style="background-image:url({{Auth::user()->avatarImage()}})"  id="userDropDown"></div> 
                       <span class="clearfix"></span>
                    </div>
                    <div id="myDropdown" class="dropdown-content">
                      <a class="dropdown-item" href="{{asset('profile')}}">Profile</a>
                       <a  class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      
                     
                    </div>
                  </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
        </nav>
        @endif
        
        @yield('content')
       
       <a class="floating-btn floating-fixed" id="newMeme" href="{{asset('new-meme')}}"><span class="fa fa-plus"></span></a>
    </div>

    <!-- Scripts -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/requester.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
     
      
</body>
</html>
