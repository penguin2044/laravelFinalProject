<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserControler extends Controller
{
    public function signUpLink()
    {
        return view('sign_up');
    }
    public function loginLink()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $inComingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'password' => ['required', 'min:5', 'max:100',]
        ]);

        if (auth()->attempt(['name' => $inComingFields['name'], 'password' => $inComingFields['password']])) {
            $request->session()->regenerate();
        } else {
            return back()->withErrors(['loginError' => 'Invalid credentials. Please try again.']);
        }
        return redirect('/');
    }
    public function signUp(Request $request)
    {
        $inComingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:50', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:100'],
            'rePassword' => ['required', 'same:password', 'min:5', 'max:100']
        ]);
        $inComingFields['admin'] = false;
        $inComingFields['password'] = bcrypt($inComingFields['password']);
        $user = User::create($inComingFields);
        auth()->login($user);

        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
