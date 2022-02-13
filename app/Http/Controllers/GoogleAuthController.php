<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /** make google oauth  */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /** callback from google */
    public function callback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $googleData[] = [
                'name' => $user->name,
                'provider' => 'google',
                'email' => $user->email,
            ];

            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->id),
                // 'provider' => 'google',
                'google_id' => $user->id,
                'photo_path' => $user->avatar,
            ]);

            auth()->login($newUser);
        }

        return redirect()->to('home');
    }
}
