<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class TwitterAuthController extends Controller
{
    //create twitter oauth
    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    //callback twitter oauth
    public function callback()
    {
        $user = Socialite::driver('twitter')->user();
        $authUser = $this->findOrCreateUser($user);
        auth()->login($authUser, true);
        return redirect('/');
    }

    //find or create user
    public function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'twitter_id' => $twitterUser->id,
            'twitter_data' => json_encode($twitterUser),
            'nickname' => $twitterUser->nickname,
            'name' => $twitterUser->name,
            'email' => $twitterUser->email,
            'password' => Hash::make($twitterUser->token),
        ]);
    }


}
