<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class authGoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('google')->stateless()->user();
        // dd($githubUser);
        $finduser = User::where('email', $githubUser->getEmail())->first();
        if ($finduser) {
            Auth::login($finduser);
            return view('announcements.userPage');
        } else {
            $user = User::create(
                [
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'password' => encrypt(''),
                    'github_token' => $githubUser->token,
                    'provider_id' => $githubUser->id,
                    // 'github_refresh_token' => $githubUser->refreshToken,
                ]
            );
        }


        Auth::login($user);

        return view('announcements.userPage');
    }
}
