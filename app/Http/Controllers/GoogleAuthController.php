<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
            try {
                $user = Socialite::driver('google')->stateless()->user();
                $finduser = User::where('google_id', $user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect('/dashboard');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'google_profile_photo'=>$user->avatar,
                    ]);
                    Auth::login($newUser);
                    return redirect('/dashboard');
                }
            } catch (Exception $e) {
               dd($e->getMessage());
            }
    }
}