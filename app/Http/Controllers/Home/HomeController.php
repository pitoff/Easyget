<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('home.index', [
            'categories' => Category::all()
        ]);
    }

    public function showBusinessViaCategory(Request $request)
    {
        $get_cat_name = Category::find($request->category);
        $getBusiness = Business::where('category_id', $request->category)->paginate();
        
        return view('home.get_business', [
            'business' => $get_cat_name,
            'businesses' => $getBusiness
        ]);
    }
}
