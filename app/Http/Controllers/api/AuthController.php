<?php

namespace App\Http\Controllers\api; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    { 
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        
        $token = Auth::attempt($credentials);
        if (!$token) { 
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
         
        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ], 200);

    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => 'teest.jpg',
            'password' => Hash::make($request->password),
        ]);
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ], 200);
    }

    public function users()
    {
        $user = User::get();
        $status = 204;
        $data = null;
        $message = "Data not found";
        if(count($user) > 0)
        {
            
            $data = $user;
            $message = "success";
            $status = 200;
        }
        return response()->json([
            'status' => $status,
            'data' => $user,
            'message' => $message
        ]);
    }
    public function user()
    {
        $user = Auth::user();
        $status = 204;
        $data = null;
        $message = "Data not found";
        if($user)
        {
            
            $data = $user;
            $message = "success";
            $status = 200;
        }
        return response()->json([
            'status' => $status,
            'data' => $user,
            'message' => $message
        ]);
    }

}