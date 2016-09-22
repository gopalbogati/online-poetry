<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class FacebookController extends Controller
{

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $facebookUser = Socialite::driver('facebook')->user();
   // dd($facebookUser->getId());
        // dd($facebookUser);
        // $user= User::whereFacebookId($fbid)->get();
        // dd($user);
        $users = User::where('facebook_id', $facebookUser->getId())->first();

     //   dd($users);
        // dd($user);
        //dd($users);

        //dd($user->getFacebookId);
        // $users = User::all();

        if ($users != null) {

            Auth::login($users);
            return view('home');

        } else {

            User::create([

                'username' => $facebookUser->getNickname(),
                'email' => $facebookUser->getEmail(),
                'name' => $facebookUser->getName(),
                'facebook_id' => $facebookUser->getId(),
            ]);

            Auth::login($users);
            return view('home');

        }



    }
}
