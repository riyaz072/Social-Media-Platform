<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginRequest as FrontendLoginRequest;
use App\Http\Requests\Frontend\RegisterRequest as FrontendRegisterRequest;
use App\Http\Requests\Frontend\ResetPasswordRequest as FrontendResetPasswordRequest;
use App\Mail\ForgotPassword;
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
        return view('frontend.authentication.register');
    }

    public function registersave(FrontendRegisterRequest $request)
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

        return redirect()->route('login');
    }


    public function login()
    {
        return view('frontend.authentication.login');
    }

    public function loginsave(FrontendLoginRequest $request)
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


    public function forgotPassword()
    {
        return view('frontend.forgot-password.forgot_password');
    }

    // Verify email for reseting new password


    public function verifyEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Mail::to($user->email)->send(new ForgotPassword($user));
            return redirect()->route('forgot-password')->with('success', 'Please Check your MailBox');
        } 
        else {
            return redirect()->route('forgot-password')->with('error', 'You Are Not a Member');
        }
    }

    public function changePassword($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if ($verifyUser) {
            return view('frontend.forgot-password.reset_password', compact('verifyUser'));
        } else {
            return redirect()->route('login')->with('error', 'Your mail is not found');
        }
    }

    public function newPassword(FrontendResetPasswordRequest $request) {
        $verifiedUser = VerifyUser::where('token', $request->user_token)->first();
        $findUser = User::where('id', $verifiedUser->user_id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Your Password Has Been Changed');

    }

}
