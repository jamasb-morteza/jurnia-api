<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleOAuthConstoller extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $data = [
                'token' => $user->token,
                'refreshToken' => $user->refreshToken,
                'expiresIn' => $user->expiresIn,
                'google_id' => $user->getId(),
                'nick_name' => $user->getNickname(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'main_avatar' => $user->getAvatar()
            ];

            $current_user = User::where('google_id', $user->getId())->first();

            if ($current_user) {

                Auth::login($current_user);

                return redirect()->intended('dashboard');

            } else {

                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $data['name'],
                    'nick_name' => $data['nick_name'],
                    'main_avatar' => $user->getAvatar(),
                    'google_id' => $user->id,
                    'password' => encrypt('areWeG0nnaG0Away')
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
