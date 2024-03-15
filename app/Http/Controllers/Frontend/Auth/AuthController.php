<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('frontend.pages.auth.sign-up');
    }

    public function signUpAction() {}

    public function signIn()
    {
        return view('frontend.pages.auth.sign-in');
    }

    public function signInAction() {}

    public function signOut()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function profile()
    {
        return view('frontend.pages.auth.profile');
    }

    public function updateProfile() {}
}
