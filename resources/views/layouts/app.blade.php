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
<body @if( (isset($page) && $page == "home") || isset($isAuth )) class="bodyBg" @endif>
    <div id="app">
        @if(!isset($isAuth))
        <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top ">
            <div class="container">
          <a class="navbar-brand" href="{{asset('/')}}">Laravel Blog</a>
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
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-bell"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($friends_requests as $request)
                      {{$request->name}}
                    @endforeach
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  
                     <a  class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Изход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  
                </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
        </nav>
        @endif
            @yield('content')
       
       
    </div>

    <!-- Scripts -->

     <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
      
     
     <script>
         

     </script>
      
</body>
</html>
