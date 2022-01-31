<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only('email', 'password'))){
            return redirect(route('dashboard.home'));
        }else{
            return back()->with('LoginFailed', 'Login attempt failed');
        }
    }
}
