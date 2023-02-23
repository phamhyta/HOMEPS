<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function indexLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return view('back-end.admin.login');
        }
    }

    public function login(LoginRequest $request)
    {
        $login = [
            'email' => $request->Email,
            'password' => $request->Password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function IndexRegister()
    {
        return view('back-end.admin.register');
    }

    public function register(RegisterRequest $request)
    {
        $register = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ];
        $user = Admin::create($register);
        return redirect()->route('admin.login');
    }

    public function forgotPassword(Request $request)
    {
        return view('back-end.admin.forgot-password');
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
