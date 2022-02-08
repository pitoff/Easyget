<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request, User $user)
    {
       $field = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only('email', 'password'))){
            //check if expects json type before redirect

            if(request()->expectsJson()){

                $user = User::where('email', $field['email'])->first(); //get first email

                if(!$user || !Hash::check($field['password'], $user->password)){
                    return response([
                        'message' => 'Bad credentials'
                    ], 401);
                }

                $token = $user->createToken($user->email.'_myAppToken')->plainTextToken;
                $response = [
                    'user' => $user->name,
                    'token' => $token
                ];
                return response($response, 201);
            }

            return redirect(route('dashboard.home'));
        }else{
            return back()->with('LoginFailed', 'Login attempt failed');
        }
    }
}
