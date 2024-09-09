<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{

    public function showLoginPage() {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }
        return view('admin.auth.login');
    }


    public function dashboard() {
        return view('admin.dashboard');
    }


    public function login() {
        $validated_admin = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(3)]
        ]);

        Auth::guard('admin')->attempt($validated_admin);

        request()->session()->regenerate();

        return redirect('/admin/dashboard')->with('status', 'Profile login successfully!');
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }


    public function logout() {
        Auth::guard('admin')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/admin');
    }
}
