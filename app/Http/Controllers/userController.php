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

    public function usersAdditionalInfo(Request $request)
    {
        $this->validate($request,[
            'address' => 'nullable|max:50',
            'phone' => 'nullable|max:20',
            'city' => 'required|max:15',
            'site' => 'nullable',
        ]); 

        $id = auth()->user()->id; 
        User::where('id', $id)->update([
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'site' => $request->site
            ]);
        return redirect()->back()->with('success', 'Informazioni aggiornate');
    }

    public function storeProfileImage(Request $request)
    {
        $this->validate($request, ['image' => 'required|mimes:jpeg,png,jpg,gif']);

        $user = auth()->user(); 
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $filename = uniqid('img_') . auth()->user()->id;
            $path = $request->image->storeAs('/public/profile-images', $filename . '.' . $request->image->extension());
            $user->profile_image = $path; 
            $user->save(); 
        }else {
            return redirect()->route('user.page')->with('message', 'Errore caricamento immagine'); 
        }

        return redirect()->route('user.page')->with('success', 'Immagine profilo modificata');
       
    }
}
