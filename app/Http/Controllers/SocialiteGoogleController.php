<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteGoogleController extends Controller
{
    // Método para la authenticacion
    public function loginSocialite()
    {
        return Socialite::driver('google')->redirect();
    }

    /// método de redirección
    public function redirectCallbackSocialite()
    {
        try {
            $userGoogle = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'google_id' => $userGoogle->id,
            ], [
                'name' => $userGoogle->name,
                'email' => $userGoogle->email,
                'google_token' => $userGoogle->token,
                'google_id' => $userGoogle->id,
                "profile_photo_path" => $userGoogle->avatar
            ]);
         
            Auth::login($user);
         
            return redirect('/dashboard');
        } catch (\Throwable $th) {
            return redirect()->route("register");
        }
    }
}
