<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('frontend.pages.auth.sign-up');
    }

    public function signUpAction(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email'   => 'required|email',
            'password' => 'required|confirmed',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('frontend.home');
    }

    public function signIn()
    {
        return view('frontend.pages.auth.sign-in');
    }

    public function signInAction(Request $request) {
        $this->validate($request,[
            'email'   => 'required|email|exists:clients,email',
            'password' => 'required',
        ]);

        if (auth()->guard('client')->attempt($request->only(['email','password']))){

            return redirect()->intended('/home');
        }else{
            return redirect()->back()->with('error','الايميل او الرقم السرى غير صحيح');
        }
    }

    public function signOut(Request $request)
    {
        if(auth()->guard('client')->check()) // this means that the admin was logged in.
        {
            auth()->guard('client')->logout();
            return redirect()->route('frontend.home');
        }

        $this->guard('client')->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function profile()
    {
        return view('frontend.pages.auth.profile');
    }

    public function updateProfile() {}
}
