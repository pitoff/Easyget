<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Category;
use App\Models\ManagerRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $checkIfManagerRequestExist = ManagerRequest::where('user_id', auth()->user()->id)->exists();

        if(auth()->user()->is_admin()){

            return view('dashboard.admin.index');

        }elseif(auth()->user()->is_manager()){

            $getUserBusinesses = Business::where('user_id', auth()->user()->id)->get();
            
            return view('dashboard.is_manager.index', [
                'categories' => Category::all(),
                'businesses' => $getUserBusinesses
            ]);

        }else{

            return view('dashboard.regular.index', [
                'checkIfManagerRequestExist' => $checkIfManagerRequestExist
            ]);

        }
        
    }
}
