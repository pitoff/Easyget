<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        if(request()->expectsJson()){
            auth()->user()->tokens()->delete();
            return 'LoggedOut';
        }
        auth()->logout();
        return redirect(route('login'));
    }
}
