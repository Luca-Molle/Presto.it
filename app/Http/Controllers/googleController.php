<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class googleController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function users()
    {
        // dd('ciao');
        $googleUser = Socialite::driver('github')->user();
        $finduser = User::where('email', $googleUser->getEmail())->first();
        if ($finduser) {
            Auth::login($finduser);
            return view('announcements.userPage');
        } else {
            $user = User::create(
                [
                    'name' => $googleUser->nickname,
                    'email' => $googleUser->email,
                    'password' => encrypt(''),
                    'github_token' => $googleUser->token,
                    'provider_id' => $googleUser->id,
                    // 'github_refresh_token' => $githubUser->refreshToken,
                ]
            );
        }


        Auth::login($user);

        return view('announcements.userPage');
    }
}
