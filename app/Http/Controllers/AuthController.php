<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view("auth/login");
    }

    public function authenticate (Request $request) {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $token = auth()->attempt($validated);
        if (!$token) {
            return response()->json([
                "message" => "Incorrect Username / Password"
            ], 422);
        }
        return $this->authResponse($token);
    }

    private function authResponse($token = "") {
        return response()->json([
            "message"   => "Login Success!",
            "user"      => auth()->user(),
            "token"     => $token
        ]);
    }

    public function logout(Request $request) {
        return response()
            ->json(
                auth()->logout()
            );
    }
}
