<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use DB;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getSocialRedirect($provider){
        return Socialite::driver($provider)->scopes(['profile','email'])->redirect();
    }

    public function getSocialHandle($provider){
        $user = Socialite::driver($provider)->user();
        $checkUser = User::where('email',$user->email)->first();

        $socialUser = null;
        if($checkUser){
            $socialUser = $checkUser;
        }else{
            $socialUser = new User;
            $socialUser->email = $user->email;
            $socialUser->name = $user->name;
            $socialUser->avatar = $user->avatar_original;
            $socialUser->social_login = 1;
            $socialUser->save();
        }
        
        \Auth::login($socialUser,true);

        return redirect('profile');
    }
}
