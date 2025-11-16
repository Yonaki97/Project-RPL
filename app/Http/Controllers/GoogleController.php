<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    // Redirect ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google setelah login
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()), // password acak
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);
            return redirect('/beranda');

        } catch (\Exception $e) {
            return redirect('/signin')->with('error', 'Login dengan Google gagal!');
        }
    }
}
