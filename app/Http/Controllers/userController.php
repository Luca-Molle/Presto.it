<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class userController extends Controller
{
    public function users()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        // dd($githubUser);
        $user = User::create(
            [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password' => encrypt(''),
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);

        return view('announcements.userPage');
    }
}
