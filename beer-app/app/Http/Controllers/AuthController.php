<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorrect credentials'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }

    /*public function validate(Request $request) {
        $validate = $request->validate([
            'Barley' => 'required|float|min:10',
            'Hops' => 'required|float|min:10',
            'Malt' => 'required|float|min:10',
            'Wheat' => 'required|float|min:10',
            'Yeast' => 'required|float|min:10'
        ]);

        if ($validate === false) {
            $currentRoute = Route::getCurrentRoute()->getName();
            return redirect()->route($currentRoute)->with('refill', 'Please refill missing ingredients to continue production.');
        }
    }*/
}
