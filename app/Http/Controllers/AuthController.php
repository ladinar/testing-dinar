<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use App\Http\Requests\RegisterRequest;
use \Exception;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            if(Auth::attempt($request->only('email','password'))){
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
    
                return response([
                    'message' => 'success', 
                    'token' => $token,
                    'user' => $user
                ]);
            }
            
        } catch (\Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }        

        return response([
            'message' => 'invalid username/password'
        ], 401);
        
    }

    public function user()
    {
        return Auth::user();
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return $user;
        } catch (Exception $exception){
            return response ([
                'message' => $exception->getMessage()
            ], 400);
        }       

    }
}
