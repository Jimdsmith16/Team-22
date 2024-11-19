<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle the registration process.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],  
            'password' => ['required', 'confirmed', Rules\Password::defaults()],  
            'terms' => ['accepted'],  
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => strtolower($validatedData['email']),  
            'password' => Hash::make($validatedData['password']),
        ]);


        event(new Registered($user));


        Auth::login($user);

        return redirect()->route('login')->with('status', 'Registration successful! Please login.');
    }
}
