<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\Citizen;
use App\Models\Channel;
use Auth;

class FacebookController extends Controller
{
    public function login()
    {
        return view('app.auth.login');
    }

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        // Get user from facebook
        $facebook_user = Socialite::driver('facebook')->fields([
            'first_name', 'email'
        ])->user();

        // Check if citizen with facebook_id already exists
        $citizen = Citizen::whereHas('channels', function ($channel) use ($facebook_user) {
            $channel->where('account_id', $facebook_user->id)
                    ->where('communication_type_id', Channel::FACEBOOK);
        })->first();

        if (is_null($citizen)) {
            // Create if not exist
            $citizen = Citizen::create([
                'name' => $facebook_user->user['first_name']
            ]);

            $citizen->channels()->attach(Channel::find(Channel::FACEBOOK), [
                'account_id' => $facebook_user->id
            ]);
        }

        Auth::login($citizen);

        return redirect('/')->with('message', 'OK');
    }
}
