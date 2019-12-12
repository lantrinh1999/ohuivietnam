<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Auth;
use Socialite;


class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        // dd($social);
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        // dd($user);
        Auth::loginUsingId($user->id,true);
        
        return redirect()->route('/');
    }
}
