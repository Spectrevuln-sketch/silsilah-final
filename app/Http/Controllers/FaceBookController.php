<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    // login useing facebook
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // callback  facebook oauth


    // callback from facebook
    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $facebookdata[] = [
                'name' => $user->name,
                'provider' => 'facebook',
                'email' => $user->email,
            ];

            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->id),
                'facebook_data' => json_encode($facebookdata),
                // 'provider' => 'facebook',
                'facebook_id' => $user->id,
                'photo_path' => $user->avatar,
            ]);

            $newUser->save();
            auth()->login($newUser);
        }

        return redirect()->to('home');
    }

    public function delete_user(User $user)
    {
        $user->delete();
        return redirect()->route('home');
    }
}
