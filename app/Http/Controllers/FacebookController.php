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
        $user = Auth::guard('web')->user();

        if ($user) {
            return redirect('/');
        }

        return view('app.auth.login');
    }

    /**
     * Redirect to facebook asking for permissions
     * @return Redirect
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle callback of Facebook
     * @return Redirect
     */
    public function callback()
    {
        // Get user from facebook
        try {
            $facebook_user = Socialite::driver('facebook')->fields([
                'first_name', 'email'
            ])->user();
        } catch (\Exception $e) {
            // Errors from permissions
        }

        // Check if citizen with facebook_id already exists
        $citizen = Citizen::fromFacebook($facebook_user->id)->first();

        if (is_null($citizen)) {
            // Create if not exist
            $citizen = Citizen::createWithFacebook($facebook_user);
        }

        Auth::login($citizen);

        return redirect('/')->with('message', 'OK');
    }
}
