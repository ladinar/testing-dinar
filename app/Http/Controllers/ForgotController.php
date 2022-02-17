<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use DB;
use App\User;
use Illuminate\Support\Str;
use \Exception;
use Illuminate\Http\Response;
use Mail;
use Hash;

class ForgotController extends Controller
{
    //
    public function forgot(ForgotRequest $request)
    {
        $email = $request->input('email');

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message' => 'User doesnt exist!'
            ], 404);
        }

        $token = Str::random(10);
        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::send('Mails.forgot', ['token' => $token], function ($message) use ($email){
                $message->to($email);
                $message->subject("ganti password");
                $message->from("from@example.com");
            });

            return response([
                'message' => 'check your email!'
            ]);
        } catch (Exception $exception){
            return response ([
                'message' => $exception->getMessage()
            ], 400);
        }
        
    }

    public function reset(ResetRequest $request)
    {
        $token = $request->input('token');

        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'message' => 'invalid token!'
            ], 400);
        }

        if(!$user = User::where('email',$passwordResets->email)->first()){
            return response([
                'message' => 'User doesnt Exist!'
            ], 400);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response([
            'message' => 'success'
        ]);
    }
}
