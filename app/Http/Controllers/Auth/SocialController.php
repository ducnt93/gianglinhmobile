<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Socialite;
use App\SocialAccount;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallbackFacebook()
    {
        $user = $this->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/');

    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallbackGoogle()
    {
        $provide = 'google';
        $user = Socialite::driver($provide)->user();

        $social = SocialAccount::where('provider_user_id', $user->id)->where('provider', $provide)->first();

        if ($social) {
            $u = User::where('email', $user->email)->first();
            Auth::login($u);
            return redirect('/');
        } else {
            $temSocial = new SocialAccount();
            $temSocial->provider_user_id = $user->id;
            $temSocial->provider = $provide;

            $u = User::where('email', $user->email)->first();
            if (!$u) {
                $u = User::create([
                    'username' => $user->name,
                    'email' => $user->email
                ]);
            }
            $temSocial->user_id = $u->id;
            $temSocial->save();

            Auth::login($u);
            return redirect('/');
        }
    }
}
