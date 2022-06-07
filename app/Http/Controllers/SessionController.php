<?php

namespace App\Http\Controllers;


use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('destroy');
        $this->middleware('guest')->only(['create', 'store']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('index')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to authenticate and log in the user
        // based on the provided credentials
        if(! auth()->attempt(["email" => \request("email"), "password" => \request("password")])){

            // auth failed.
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verifed.'
            ]);
        }

        session()->regenerate();
        
        // redirect with a success flash message
        return redirect()->route('index')->with('success', 'Welcome back.');
    }
}