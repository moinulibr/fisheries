<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $data = $request->validated();
        // return $data;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        event(new Registered($user));

        // auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
