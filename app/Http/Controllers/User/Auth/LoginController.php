<?php

namespace App\Http\Controllers\User\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\UserEmailLoginMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            // Fallback for environments where session/state may not persist
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->route('index')->with('Error', 'Google login failed: '.$e->getMessage());
        }

        // Safety: Google should return an email; if not, handle it
        $email = $googleUser->getEmail();
        if (empty($email)) {
            return redirect()->route('index')->with('Error', 'Your Google account has no public email.');
        }

        // Find existing user by google_id OR by email
        $user = User::where('google_id', $googleUser->getId())->orWhere('email', $email)->first();

        if (!$user) {
            // Create a new user in our DB
            $user = User::create([
                'name'              => $googleUser->getName() ?: ($googleUser->getNickname() ?: 'Google User'),
                'email'             => $email,
                'google_id'         => $googleUser->getId(),
                'image'             => $googleUser->getAvatar(),
                'password'          => bcrypt('password'),
            ]);
        } else {
            // Keep google_id/avatar up to date if user existed only by email
            $user->forceFill([
                'google_id' => $user->google_id ?: $googleUser->getId(),
                'image'     => $googleUser->getAvatar() ?: $user->avatar,
            ])->save();
        }

        // Log them in (session)
        Auth::login($user, remember: true);

        // Redirect after login
        return redirect()->route('user.dashboard')->with('success', 'Logged In Successfully');
    }

    public function emailVerify(Request $request){
        try {
            $user = User::where('email', $request->email)->first();
            if($user){
                $mailData = [
                    'title' => 'Click the link below to login to your account.',
                    'link' =>  route('user.email.login', base64_encode($user->id))
                ];

                Mail ::to($user->email)->send(new UserEmailLoginMail($mailData));
                return response()->json([
                    'status' => 'success',
                    'message' => "Email verified",
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => " This email is not registered in our site",
                ]);
            }
        } catch (\Throwable $ex) {
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);;
        }
    }

    public function emailLogin($id){
        $id = base64_decode($id);
        $user = User::find($id);
        if($user){
            Auth::login($user, remember: true);
            return redirect()->route('user.dashboard')->with('success', 'Logged In Successfully');
        }else{
            return redirect()->route('index')->with('error', 'Invalid Link');
        }

    }

    public function logout(){
        session()->flush();
        Auth::guard('web')->logout();
        return redirect()->route('index')->with('success', 'Logged out Successfully');
    }
}
