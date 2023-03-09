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
        $finduser = User::where('email', $githubUser->getEmail())->first();
        if ($finduser) {
            Auth::login($finduser);
            return redirect()->route('user.page');
        } else {
            $user = User::create(
                [
                    'name' => $githubUser->nickname,
                    'email' => $githubUser->email,
                    'password' => encrypt(''),
                    'github_token' => $githubUser->token,
                    'provider_id' => $githubUser->id,
                    // 'github_refresh_token' => $githubUser->refreshToken,
                ]
            );
        }


        Auth::login($user);

        return redirect()->route('user.page');
    }
}
