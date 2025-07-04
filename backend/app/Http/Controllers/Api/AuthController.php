<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('job-app-token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);

    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials']);
        }

        $token = $user->createToken('job-app-token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);

    }


    public function logout( Request $request ) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }

}
