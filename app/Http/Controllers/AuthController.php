<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\{LoginRequest, RegisterRequest};
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('login') ? 'login' : 'register';
        $data['title'] = ucfirst($page);

        return view("auth.{$page}", $data);
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('index')->with('success', 'Welcome, ' . Auth::user()->name . '.');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->only([
                'name',
                'email',
                'password',
            ]);

            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return redirect()->route('auth', ['login' => 'true'])->with('success', 'Registration successful.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth', ['login' => 'true'])->with('success', 'Logout successful.');
    }
}
