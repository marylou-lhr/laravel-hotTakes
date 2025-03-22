<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['userId' => $user->id, 'token' => $token]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        
        return response()->json(['message' => 'Logged out successfully']);
    }
}
