<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'first_name' => $request->string('first_name')->trim(),
            'last_name' => $request->string('last_name')->trim(),
            'email' => $request->string('email')->trim(),
            'role' => $request->input('role'),
            'password' => $request->input('password'),
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
