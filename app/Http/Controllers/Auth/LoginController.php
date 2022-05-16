<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (auth()->user()->role == 0) {
            return '/home';
        }
        return '/post';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //google
    //https://console.cloud.google.com/apis/dashboard?pli=1&project=kachin-longyi
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }


    //google Callback
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('home');
    }

    //Facebook
    //https://developers.facebook.com/
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }


    //Facebook Callback
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user();
        return dd($user);
        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('home');
    }

    //github
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }


    //github Callback
    public function handleGithubCallback(){
        $user = Socialite::driver('github')->user();
        $this->_registerOrLoginUser($user);

        //return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->photo = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

}
