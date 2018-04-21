@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                 <h1>Sign Up</h1>
                <a href="{{asset('social/redirect/facebook') }}" class="socialBtn socialFb"><div class="justifyFlexCenter justifyCenter"><span class="fa fa-facebook-square"></span> Facebook</div></a>
                <a href="{{asset('social/redirect/google') }}" class="socialBtn socialGoogle"><img src="{{asset('images/icon-google.png')}}"> Google</a>
                <a href="{{asset('social/redirect/twitter') }}" class="socialBtn socialTwitter"><div class="justifyFlexCenter justifyCenter"><span class="fa fa-twitter"></span>  Twitter</div></a>
                <h3>or</h3>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="">Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="">E-Mail Address</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="">Confirm Password</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class=" auth-btn btn btn-primary">
                                    Register
                                </button>
                           
                        </div>
                    </form>
                </div>
            </div>
       
    </div>
</div>
@endsection
