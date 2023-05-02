<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('content.auth.auth-login-basic');
    }

    public function auth(Request $request)
    {

       $request->validate([
        'email' => ['required'],
        'password' => ['required']
       ],
       [
        'email.required' => 'Informe um email válido',
        'password.required' => 'Informe sua senha'
       ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');

        } else {
            return redirect()->back()->with('danger', 'Email ou senha inválido!');
        }
    }

    public function create()
    {
        return view('content.auth.auth-register-basic');
    }

    public function pageAccountSettings($id){
        return view('content.user.pages-account-settings-account', [
            'user' => User::find($id)
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login.index');
    }

}
