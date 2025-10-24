<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminForgotPasswordOTP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function loginSubmit(Request $request){
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged In Successfully');
        } else {
            return redirect()->back()->with('error', 'Incorrect Credentials');
        }
    }

    public function forgetPassword(){
        return view('admin.email_verify');
    }

    public function emailVerify(Request $request){
        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'Invalid Email. This email is not registered');
        }

        // store OTP in admin 
        $otp = rand(1000,9999);
        $admin->otp = $otp;
        $admin->save();

        //put admin in session
        session()->put('admin', $admin);
        
        $mailData = [
              'title' => 'Verification Code',
              'body' => 'Use this code ' . $otp . ' for verification and reset your password'
          ];

        //send OTP in email
        Mail::to($admin->email)->send(new AdminForgotPasswordOTP($mailData));


        return redirect()->route('admin.otp.verify')->with('success', 'OTP sent successfully');
    }

    public function otpVerify(Request $request){
        return view('admin.otp_verify');
    }

    public function otpCheck(Request $request){
        $admin = session()->get('admin');
        if(!$admin){
            return redirect()->route('admin.forget.password')->with('error', 'Invalid Session');
        }

        if($admin->otp != $request->otp){
            return redirect()->back()->with('error', 'Invalid OTP');
        }

        return redirect()->route('admin.reset.password')->with('success', 'OTP verified');
    }

    public function resetPassword(Request $request){
        return view('admin.reset_password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.confirmed' => 'Password and Confirm Password must match.',
        ]);

        $admin = session()->get('admin');
        if(!$admin){
            return redirect()->route('admin.forget.password')->with('error', 'Invalid Session');
        }
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Password Reset successfully');
    }

    public function logout(){
        session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out Successfully');
    }
}
