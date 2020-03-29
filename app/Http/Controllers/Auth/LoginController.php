<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
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
    // RouteServiceProvider::HOME
    protected $redirectTo ='/blogs';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    //facebook
    public function redirectFBToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $this->FindOrCreate($user);
        // $user->token;
    }
    //facebook
    public function handleFBProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->FindOrCreate($user);
    }

    //function for create or login user
    public function FindOrCreate($user)
    {
        $user=User::where('email',$user->email)->get();
        if(!$user)
        {   
             User::create([
                "name"=>$user->name,
                "email"=>$user->email,
                "remember_token"=>$user->token,
                "password"=>"null"
            ]); 
            Auth::login($user);
        }
        else
        {
            Auth::login($user);
        }
    }

}
