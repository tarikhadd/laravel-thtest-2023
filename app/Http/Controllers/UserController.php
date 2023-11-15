<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Auth Form

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3']
        ]);

        //Hash 
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');

    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request) {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // //Hash 
        // $formFields['password'] = bcrypt($formFields['password']);

        // $user = User::create($formFields);

        // auth()->login($user);

        // return redirect('/')->with('message', 'User created and logged in');

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'User logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials']) -> onlyInput('email');

    }
}
