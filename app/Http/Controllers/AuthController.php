<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Added for explicit password hashing
use Illuminate\Validation\Rules\Password; // Added for better password validation

class AuthController extends Controller 
{
    /**
     * Register a new user
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Enhanced validation rules for better security and data integrity
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'], // Added max length
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed',  // confirmed must be present for password_confirmation in request body
                Password::min(8) // Enhanced password validation
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        // Create user with try-catch for better error handling
        try {
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password']), // Using Hash facade explicitly
                'remember_token' => Str::random(60)
            ]);

            // Return response with created status code
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'user' => $user // Only return safe user data
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Login user and create token
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate input fields
        $fields = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        // Find user by email
        try {
            $user = User::where('email', $fields['email'])->first();

            // Check if user exists
            if (!$user || !Auth::attempt($fields)) {
                return redirect()->back()
                    ->withErrors([
                        'email' => 'Email atau password salah.'
                    ])
                    ->withInput($request->except('password'));
            }
            
            // Generate token with explicit device name
            $token = $user->createToken('auth_token')->plainTextToken;

            session(['token' => $token]);
            
            // Return success response
            return redirect()->route('admin.dashboard')->with('user', $user);

        } catch (\Exception $e) {
            return redirect()->back()
            ->withErrors([
                'email' => $e->getMessage()
            ])
            ->withInput($request->except('password'));
        }
    }
}