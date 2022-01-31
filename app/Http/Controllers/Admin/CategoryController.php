<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.admin.category.index');
    }

    public function store(Request $request)
    {
        request()->validate([
            'category' => 'required|unique:categories'
        ]);

        Category::create([
            'category' => $request->category
        ]);
        return back();
    }
}
