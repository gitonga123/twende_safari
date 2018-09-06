<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|max:6',
        ]);
    }

    public function redirectToFacebook()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function getFacebookCallback()
    {
        $data = Socialite::with('facebook')->user();
        $user = User::where('email', $data->email)->first();
        if (!is_null($user)) {
          //Login in the User
            Auth::login($user);
            $user->name = $data->user['name'];
            $user->provider_id = $data->user['id'];
            $user->save();
        } else {
            $user = User::where('provider_id', $data->user['id'])->first();
            if (is_null($user)) {
              // Create a new User
                $user = new User();
                $user->name = $data->user['name'];
                $user->email = $data->email;
                $user->provider_id = $data->user['id'];
                $user->save();
            }
            Auth::login($user);
        }
        return redirect('/')->with('success', 'Successfully Logged in!');
    }
}
