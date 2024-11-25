<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{   
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'data' => empty($users) ? 'Users data is empty' : $users
        ], empty($users) ? 400 : 200);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 
                Password::min(8) 
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        try {
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => Hash::make($fields['password']),
                'remember_token' => Str::random(60)
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'user' => $user
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show ($id)
    {
        if (!$id)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID is required'
            ], 400);
        }

        if (!is_numeric($id))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID must be a number'
            ], 400);
        }

        $user = User::find($id);

        return response()->json([
            'status' => empty($user) ? false : true,
            'data' => empty($user) ? 'User data not found' : $user
        ], 404);


    }

    public function destroy($id)
    {
        if (!$id)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID is required'
            ], 400);
        }

        if (!is_numeric($id))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID must be a number'
            ], 400);
        }

        $user = User::find($id);

        if (empty($user))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User data not found'
            ], 404);
        }

        User::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'User data deleted successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if (!$id)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID is required'
            ], 400);
        }

        if (!is_numeric($id))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User ID must be a number'
            ], 400);
        }

        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 
                Password::min(8) 
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        $user = User::find($id);

        if (empty($user))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User data not found'
            ], 404);
        }

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password']);
        $user->remember_token = Str::random(60);

        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User data updated successfully',
            'user' => $user
        ], 204);
    }
}
