<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyMail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registersave(RegisterRequest $request)
    {

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_no = $request->phone_no;
        $user->gender = $request->gender;
        $user->save();

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;

        // return redirect()->route('login');
    }


    public function login()
    {
        return view('login');
    }

    public function loginsave(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    // public function verifyUser($token)
    // {
    //     $verifyUser = VerifyUser::where('token', $token)->first();
    //     if (isset($verifyUser)) {
    //         $user = $verifyUser->user;
    //         if (!$user->verified) {
    //             $verifyUser->user->verified = 1;
    //             $verifyUser->user->save();
    //             $status = "Your e-mail is verified. You can now login.";
    //         } else {
    //             $status = "Your e-mail is already verified. You can now login.";
    //         }
    //     } else {
    //         return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
    //     }
    //     return redirect('/login')->with('status', $status);
    // }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if ($verifyUser->user->verified = 0) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('status', $status);
    }
}
