<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            Log::info('Login attempt for username: ' . $credentials['username']);

            $user = User::where('username', $credentials['username'])
                        ->where('role', 'admin')
                        ->first();

            if (!$user) {
                Log::info('User not found');
                return response()->json([
                    'message' => 'Invalid credentials - User not found'
                ], 401);
            }

            Log::info('User found, checking password');
            if (!Hash::check($credentials['password'], $user->password)) {
                Log::info('Password mismatch');
                return response()->json([
                    'message' => 'Invalid credentials - Password incorrect'
                ], 401);
            }

            Log::info('Password correct, logging in user');
            Auth::login($user);
            $request->session()->regenerate();

            Log::info('User logged in successfully');
            return response()->json([
                'user' => [
                    'id' => $user->user_id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'profile' => $user->profile
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Login failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tbl_users,username',
            'password' => 'required|min:6|confirmed',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'admin',
            ]);

            Profile::create([
                'user_id' => $user->user_id,
                'profile_first_name' => $request->first_name,
                'profile_middle_name' => $request->middle_name,
                'profile_last_name' => $request->last_name,
            ]);

            DB::commit();
            return response()->json(['message' => 'Registration successful'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function dashboard()
    {
        return response()->json(['user' => Auth::user()->load('profile')]);
    }
}
