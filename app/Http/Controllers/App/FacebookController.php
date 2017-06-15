<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;

use App\Models\Citizen;
use App\Models\Channel;

/**
 * FacebookController is a class that ask for permissions on facebook,
 * then handle the permissions and use it for authenticate citizens. *
 * For the moment, for close the session of the citizen
 *
 * @package App\Http\Controllers
 * @author Junior Zavaleta
 * @version 1.0
 */
class FacebookController extends Controller
{
    /**
     * Redirect to facebook asking for permissions
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle callback of Facebook
     * @return \Illuminate\Http\Response
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

    /**
     * Logout the session of citizen
     * @return \Illuminate\Http\Response
     */
    protected function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
