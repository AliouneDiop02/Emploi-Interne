<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function showLogin(): View
    {
        return view('auth.login');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('emplois.index'));
        }
        return back()
            ->withErrors(['email' => 'Ces identifiants ne correspondent à aucun compte.'])
            ->onlyInput('email');
    }


    // Logout

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('emplois.index')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
