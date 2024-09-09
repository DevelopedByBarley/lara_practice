<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    public function dashboard(User $user)
    {
        return view('auth.dashboard', [
            'user' => Auth::user()
        ]);
    }
    public function login(User $user)
    {
        $validated_user = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6)] // -> password_confirmation
        ]);

       if(!Auth::attempt($validated_user)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match'
        ]);
       }



       request()->session()->regenerate();

       return redirect('/user/dashboard');
    }



    public function showLoginPage() {
        return view('auth.login');
    }

    public function showRegisterPage() {
        return view('auth.register');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_user = request()->validate([
            'name' => ['required', 'max:254'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(3)]
        ]);

        $user = User::create($validated_user);

        Auth::guard('web')->login($user);

        return redirect('/user/dashboard');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
