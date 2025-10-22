<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

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

    public function logout(){
        session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out Successfully');
    }
}
