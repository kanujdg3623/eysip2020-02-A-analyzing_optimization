<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','userLogout']);
    }
    public function check(Request $request)
    {
    	$user=User::where('email',$request->email);
        if($user->exists()){ 
        	if( $user->first()->approved_by=="pending")       	
	        	return redirect('/login')->with('status', 'Wait for administrator\'s approval');
        }
    	return $this->login($request);
    }
    public function userLogout(Request $request){
   		Auth::guard('web')->logout();
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
	}
}
