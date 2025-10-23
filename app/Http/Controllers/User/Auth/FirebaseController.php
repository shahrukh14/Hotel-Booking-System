<?php

namespace App\Http\Controllers\User\Auth;

use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class FirebaseController extends Controller
{
    protected $firebaseAuth;

    public function __construct(){
        $this->firebaseAuth = Firebase::auth();
    }

    public function login(Request $request)
    {
        $request->validate([
            'idToken' => 'required|string',
        ]);

        $idToken = $request->input('idToken');

        try {
            $verifiedToken = $this->firebaseAuth->verifyIdToken($idToken);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Firebase ID token.',
                'error' => $e->getMessage()
            ], 401);
        }

        $uid = $verifiedToken->claims()->get('sub');

        try {
            $firebaseUser = $this->firebaseAuth->getUser($uid);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to fetch Firebase user.',
                'error' => $e->getMessage()
            ], 500);
        }

        $email = $firebaseUser->email ?? null;
        if (empty($email)) {
            return response()->json(['status' => 'error', 'message' => 'Firebase account does not provide an email.'], 400);
        }

        $user = User::where('firebase_uid', $uid)->orWhere('email', $email)->first();

        if (! $user) {
            $user = User::create([
                'name' => $firebaseUser->displayName ?? explode('@', $email)[0],
                'email' => $email,
                'firebase_uid' => $uid,
                'image' => $firebaseUser->photoUrl ?? null,
                'password' => bcrypt('password'),
            ]);
        } else {
            $updated = false;
            if (!$user->firebase_uid) {
                $user->firebase_uid = $uid;
                $updated = true;
            }
            if (empty($user->image) && !empty($firebaseUser->photoUrl)) {
                $user->image = $firebaseUser->photoUrl;
                $updated = true;
            }
            if ($updated) {
                $user->save();
            }
        }

        Auth::login($user, true);

        return response()->json([
            'status' => 'success',
            'redirect' => route('user.dashboard')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flush();

        return response()->json([
            'status' => 'success',
            'redirect' => route('index')
        ]);
    }
}
