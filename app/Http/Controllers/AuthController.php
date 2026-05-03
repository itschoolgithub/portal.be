<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], 422);
        }
        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Пароль не подходит'
            ], 422);
        }

        return $user;
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|confirmed'
        ]);
    }
}
