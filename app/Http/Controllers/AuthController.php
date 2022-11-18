<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'fisrtname' => 'required',
            'lastname' => 'required'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'fisrtname' => $fields['fisrtname'],
            'lastname' => $fields['lastname']
        ]);

        $token = $user->createToken('fashionwebToken')->plainTextToken;

        $respone = [
            'user' => $user,
            'token' => $token
        ];

        return response($respone, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string  ',
        ]);

        //checked email
        $user = User::where('email', $fields['email'])->first();

        //checked password
        if(!$user || !Hash::check($fields['password'], $user->password))
        {
            return response([
                'message' => "Bad Creds"
            ], 401);
        }

        $token = $user->createToken('fashionwebToken')->plainTextToken;

        $respone = [
            'user' => $user,
            'token' => $token
        ];

        return response($respone, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
